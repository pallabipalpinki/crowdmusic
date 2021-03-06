<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('CI'))
{
    function CI() {
        if (!function_exists('get_instance')) return FALSE;

        $CI =& get_instance();
        return $CI;
    }
}


if(!function_exists('post_data')){
    function post_data($post_var=NULL){
        if($post_var==NULL){
            return xss_clean(remove_invisible_characters(html_escape(CI()->input->post())));
        }else{
            return remove_invisible_characters(xss_clean(strip_javascript(strip_whitespace(encode_php_tags(CI()->input->post($post_var))))));
        }
        
    }
}

if(!function_exists('get_data')){
    function get_data($get_var){
        return xss_clean(strip_javascript(strip_whitespace(encode_php_tags(CI()->input->get($post_var)))));
    }
}

if(!function_exists('clean_data')){
    function clean_data($data){
        return html_escape(xss_clean(strip_javascript(strip_whitespace(encode_php_tags($data)))));  
    }
}

if(!function_exists('clean_json_data')){
    function clean_json_data($data){
        return clean_data(remove_invisible_characters(xss_clean(strip_javascript(strip_whitespace(encode_php_tags($data))))));
    }
}


if (!function_exists('strip_javascript'))
{
    function strip_javascript($str)
    {
        $str = preg_replace('#<script[^>]*>.*?</script>#is', '', $str);
        return $str;
    }
}


if (!function_exists('strip_whitespace'))
{
    function strip_whitespace($str)
    {
        return trim(preg_replace('/\s\s+|\n/m', '', $str));
    }
}

if (!function_exists('zap_gremlins'))
{
    function zap_gremlins($str, $replace = '')
    {
        // there is a hidden bullet looking thingy that photoshop likes to include in it's text'
        // the remove_invisible_characters doesn't seem to remove this
        $str = preg_replace('/[^\x0A\x0D\x20-\x7E]/', $replace, $str);
        return $str;
    }
}


if (!function_exists('session_userdata'))
{
    function session_userdata($key)
    {
        
        if (!isset(CI()->session))
        {
            CI()->load->library('session');
        }
        return CI()->session->userdata($key);
    }
}


if (!function_exists('session_set_userdata'))
{
    function session_set_userdata($value)
    {
     
        if (!isset(CI()->session))
        {
            CI()->load->library('session');
        }
        return CI()->session->set_userdata($value);
    }
}

if (!function_exists('session_unset_userdata'))
{
    function session_unset_userdata($array_items)
    {
     
        if (!isset(CI()->session))
        {
            CI()->load->library('session');
        }

        CI()->session->unset_userdata($array_items);
        CI()->session->sess_destroy();
    }
}

if(!function_exists('json_header_encode')){
    function json_header_encode($value){
        header('Content-Type: application/json');

        echo json_encode($value);
    }
}

if(!function_exists('url_slug')){
    function url_slug($str, $options = array()) {
        // Make sure string is in UTF-8 and strip invalid UTF-8 characters
        $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());
        
        $defaults = array(
            'delimiter' => '-',
            'limit' => null,
            'lowercase' => true,
            'replacements' => array(),
            'transliterate' => false,
        );
        
        // Merge options
        $options = array_merge($defaults, $options);
        
        $char_map = array(
            // Latin
            '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'A', '??' => 'AE', '??' => 'C', 
            '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'E', '??' => 'I', '??' => 'I', '??' => 'I', '??' => 'I', 
            '??' => 'D', '??' => 'N', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', '??' => 'O', 
            '??' => 'O', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'U', '??' => 'Y', '??' => 'TH', 
            '??' => 'ss', 
            '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'a', '??' => 'ae', '??' => 'c', 
            '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'e', '??' => 'i', '??' => 'i', '??' => 'i', '??' => 'i', 
            '??' => 'd', '??' => 'n', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', '??' => 'o', 
            '??' => 'o', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'u', '??' => 'y', '??' => 'th', 
            '??' => 'y',

            // Latin symbols
            '??' => '(c)',

            // Greek
            '??' => 'A', '??' => 'B', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Z', '??' => 'H', '??' => '8',
            '??' => 'I', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => '3', '??' => 'O', '??' => 'P',
            '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'Y', '??' => 'F', '??' => 'X', '??' => 'PS', '??' => 'W',
            '??' => 'A', '??' => 'E', '??' => 'I', '??' => 'O', '??' => 'Y', '??' => 'H', '??' => 'W', '??' => 'I',
            '??' => 'Y',
            '??' => 'a', '??' => 'b', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'z', '??' => 'h', '??' => '8',
            '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => '3', '??' => 'o', '??' => 'p',
            '??' => 'r', '??' => 's', '??' => 't', '??' => 'y', '??' => 'f', '??' => 'x', '??' => 'ps', '??' => 'w',
            '??' => 'a', '??' => 'e', '??' => 'i', '??' => 'o', '??' => 'y', '??' => 'h', '??' => 'w', '??' => 's',
            '??' => 'i', '??' => 'y', '??' => 'y', '??' => 'i',

            // Turkish
            '??' => 'S', '??' => 'I', '??' => 'C', '??' => 'U', '??' => 'O', '??' => 'G',
            '??' => 's', '??' => 'i', '??' => 'c', '??' => 'u', '??' => 'o', '??' => 'g', 

            // Russian
            '??' => 'A', '??' => 'B', '??' => 'V', '??' => 'G', '??' => 'D', '??' => 'E', '??' => 'Yo', '??' => 'Zh',
            '??' => 'Z', '??' => 'I', '??' => 'J', '??' => 'K', '??' => 'L', '??' => 'M', '??' => 'N', '??' => 'O',
            '??' => 'P', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', '??' => 'F', '??' => 'H', '??' => 'C',
            '??' => 'Ch', '??' => 'Sh', '??' => 'Sh', '??' => '', '??' => 'Y', '??' => '', '??' => 'E', '??' => 'Yu',
            '??' => 'Ya',
            '??' => 'a', '??' => 'b', '??' => 'v', '??' => 'g', '??' => 'd', '??' => 'e', '??' => 'yo', '??' => 'zh',
            '??' => 'z', '??' => 'i', '??' => 'j', '??' => 'k', '??' => 'l', '??' => 'm', '??' => 'n', '??' => 'o',
            '??' => 'p', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u', '??' => 'f', '??' => 'h', '??' => 'c',
            '??' => 'ch', '??' => 'sh', '??' => 'sh', '??' => '', '??' => 'y', '??' => '', '??' => 'e', '??' => 'yu',
            '??' => 'ya',

            // Ukrainian
            '??' => 'Ye', '??' => 'I', '??' => 'Yi', '??' => 'G',
            '??' => 'ye', '??' => 'i', '??' => 'yi', '??' => 'g',

            // Czech
            '??' => 'C', '??' => 'D', '??' => 'E', '??' => 'N', '??' => 'R', '??' => 'S', '??' => 'T', '??' => 'U', 
            '??' => 'Z', 
            '??' => 'c', '??' => 'd', '??' => 'e', '??' => 'n', '??' => 'r', '??' => 's', '??' => 't', '??' => 'u',
            '??' => 'z', 

            // Polish
            '??' => 'A', '??' => 'C', '??' => 'e', '??' => 'L', '??' => 'N', '??' => 'o', '??' => 'S', '??' => 'Z', 
            '??' => 'Z', 
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'l', '??' => 'n', '??' => 'o', '??' => 's', '??' => 'z',
            '??' => 'z',

            // Latvian
            '??' => 'A', '??' => 'C', '??' => 'E', '??' => 'G', '??' => 'i', '??' => 'k', '??' => 'L', '??' => 'N', 
            '??' => 'S', '??' => 'u', '??' => 'Z',
            '??' => 'a', '??' => 'c', '??' => 'e', '??' => 'g', '??' => 'i', '??' => 'k', '??' => 'l', '??' => 'n',
            '??' => 's', '??' => 'u', '??' => 'z'
        );
        
        // Make custom replacements
        $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);
        
        // Transliterate characters to ASCII
        if ($options['transliterate']) {
            $str = str_replace(array_keys($char_map), $char_map, $str);
        }
        
        // Replace non-alphanumeric characters with our delimiter
        $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);
        
        // Remove duplicate delimiters
        $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);
        
        // Truncate slug to max. characters
        $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');
        
        // Remove delimiter from ends
        $str = trim($str, $options['delimiter']);

        $str = str_replace('-amp-', '-and-', $str);
        
        return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
    }
}

if (!function_exists('print_obj'))
{
    function print_obj($obj, $return = FALSE)
    {
        $str = "<pre>";
        if (is_array($obj))
        {
            // to prevent circular references
            if (is_a(current($obj), 'Data_record'))
            {
                foreach($obj as $key => $val)
                {
                    $str .= '['.$key.']';
                    $str .= $val;
                }
            }
            else
            {
                $str .= print_r($obj, TRUE);
            }
        }
        else
        {
            if (is_a($obj, 'Data_record'))
            {
                $str .= $obj;
            }
            else
            {
                $str .= print_r($obj, TRUE);
            }
        }
        $str .= "</pre>";
        if ($return) return $str;
        echo $str;
    }
}

if (!function_exists('favorites_check'))
{

    function favorites_check($parent_array, $child_array)
    {

        $array = array();
        foreach ($parent_array as $value)
        {

            if (in_array($value['id'], $child_array))
            {
                $value['favourite'] = '1';
            }
            $array[] = $value;
        }
        return $array;
    }
}

if (!function_exists('send_message'))
{

    function send_message($data)
    {

        $message = $data['message'];
        $user_chat_details = (!empty($data['additional_data'])) ? $data['additional_data'] : '';
        $notifications_title = (!empty($user_chat_details['from_name'])) ? $user_chat_details['from_name'] : 'Success notification';

        if (!empty($message))
        {
            $user_id = $data['user_id'];
            $include_player_ids = $data['include_player_ids'];
            $include_player_id = array(
                $include_player_ids
            );
            $heading = array(
                "en" => $notifications_title
            );
            $content = array(
                "en" => "$message"
            );

            $app_id = $data['app_id'];

            $fields = array(
                'app_id' => $app_id,
                'data' => $data['additional_data'],
                //'included_segments' => array('All'),
                //'included_segments' =>  array("Active Users", "Inactive Users"),
                // 'filters' => array(array("field" => "tag", "key" => "user_id", "relation" => "=", "value" => "$user_id")),
                'include_player_ids' => $include_player_id,
                'contents' => $content,
                'headings' => $heading
            );
            if (empty($include_player_ids))
            {
                unset($fields['include_player_ids']);
            }

            $fields = json_encode($fields);
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json; charset=utf-8',
                'Authorization: Basic ' . $data['reset_key']
            ));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            $response = curl_exec($ch);
            curl_close($ch);

            return $response;
        }
    }
}

if (!function_exists('gigs_settings'))
{

    function gigs_settings()
    {
        $ci = & get_instance();
        $query = $ci
            ->db
            ->query("select * from system_settings WHERE status = 1");
        return $query->result_array();
    }
}

if (!function_exists('gigs_admin_email'))
{

    function gigs_admin_email()
    {
        $ci = & get_instance();
        $ci
            ->load
            ->database();
        return $ci
            ->db
            ->select('email')
            ->get('administrators')
            ->row()->email;
    }
}

if (!function_exists('smtp_mail_config'))
{

    function smtp_mail_config()
    {
        $config = array(
            'protocol' => 'send',
            'mailtype' => 'html',
            'charset' => 'utf-8'
        );
        $ci = & get_instance();
        $ci
            ->load
            ->database();
        $ci
            ->db
            ->select('key,value,system,groups');
        $ci
            ->db
            ->from('system_settings');
        $query = $ci
            ->db
            ->get();
        $results = $query->result();

        $smtp_host = '';
        $smtp_port = '';
        $smtp_user = '';
        $smtp_pass = '';
        if (!empty($results))
        {
            foreach ($results as $result)
            {
                $result = (array)$result;
                if ($result['key'] == 'smtp_host')
                {
                    $smtp_host = $result['value'];
                }
                if ($result['key'] == 'smtp_port')
                {
                    $smtp_port = $result['value'];
                }
                if ($result['key'] == 'smtp_user')
                {
                    $smtp_user = $result['value'];
                }
                if ($result['key'] == 'smtp_pass')
                {
                    $smtp_pass = $result['value'];
                }
            }

            if (!empty($smtp_host) && !empty($smtp_port) && !empty($smtp_user) && !empty($smtp_pass))
            {
                $config = array(
                    'protocol' => 'send',
                    'smtp_host' => 'ssl://' . $smtp_host,
                    'smtp_port' => $smtp_port,
                    'smtp_user' => "$smtp_user",
                    'smtp_pass' => "$smtp_pass",
                    'mailtype' => 'html',
                    'charset' => 'utf-8'
                );
            }
        }
        return $config;
    }

}

if (!function_exists('check_subscription'))
{

    function check_subscription($userid, $timezone)
    {
        $ci = & get_instance();
        date_default_timezone_set($timezone);
        $current_time = date('Y-m-d H:i:s');

        $where = array(
            'userid' => $userid,
            'subscription_payment_status' => 1,
            'status' => 1
        );
        $check = $ci
            ->db
            ->get_where('subscriptions_payments', $where)->row_array();

        $check_no_of_gigs = $ci
            ->db
            ->select_sum('subscription_gigs')
            ->get_where('subscriptions_payments_logs', $where)->row()->subscription_gigs;

        if (!empty($check))
        {
            $where1 = array(
                'user_id' => $userid,
            );
            $gigscount = $ci
                ->db
                ->get_where('sell_gigs', $where1)->num_rows();

            //      echo $gigscount;
            // exit;
            $where2 = array(
                'userid' => $userid,
                'expired_date >=' => $current_time,
                'subscription_payment_status' => 1,
                'status' => 1
            );
            $check_validity = $ci
                ->db
                ->get_where('subscriptions_payments', $where2)->row_array();

            if (!empty($check_validity))
            {
                if ($check_no_of_gigs <= $gigscount)
                {
                    return "limitexceed";
                }
                else
                {
                    return "Valid";
                }

            }
            else
            {
                return "Expired";
            }

        }
        else
        {
            return false;
        }

    }
}


function subsstring($string,$length=20){
    if (strlen($string) > $length) {
        $string = substr($string, 0, $length) . "..."; 
    }

    return $string;
}

?>
