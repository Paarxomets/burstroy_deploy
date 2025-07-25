<?php
file_put_contents('/tmp/debug.log', "DOCUMENT_ROOT: " . $_SERVER['DOCUMENT_ROOT'] . "\n");
file_put_contents('/tmp/debug.log', "SCRIPT_FILENAME: " . $_SERVER['SCRIPT_FILENAME'] . "\n", FILE_APPEND);
file_put_contents('/tmp/debug.log', "PHP_SELF: " . $_SERVER['PHP_SELF'] . "\n", FILE_APPEND);
file_put_contents('/tmp/debug.log', print_r($_SERVER, true));
ini_set('error_reporting', E_ALL);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', 'error.log');
version_compare(PHP_VERSION, '5.2', '>=') || exit('PHP ' . PHP_VERSION . ' is not supported');
define('a_', 'document_root');
define('b_', 'query_string');
define('c_', 'request_uri');
define('d_', 'php_self');
define('e_', 'http_accept_language');
define('f_', 'http_user_agent');
define('g_', 'remote_addr');
define('h_', 'server_addr');
define('i_', 'script_filename');
define('j_', 'script_name');
define('k_', 'server_name');
define('l_', 'server_protocol');
define('m_', 'lang');
define('n_', 'password');
define('o_', 'session');
define('p_', 'pass_complexity');
define('q_', 'pass_complexity_js');
define('r_', 'auth_time');
define('s_', 'auth_error_time');
define('t_', 'auth_error_list');
define('u_', 'auth_error_limit');
define('v_', 'auth_lockout_duration');
define('w_', 'auth_session_reset');
define('x_', 'auth_bot_filter');
define('y_', 'code_redraw_delay');
define('z_', 'code_undo_limit');
define('A_', 'code_highlighting');
define('_s', 'visual_ext');
define('B_', 'allowed_ext');
define('C_', 'editable_ext');
define('_P', 'editable_attributes');
define('D_', 'default_file');
define('_Q', 'folder_size');
define('E_', 'document_root');
define('F_', 'url_rewrite');
define('G_', 'logout_to_site');
define('H_', 'link_replacing');
define('I_', 'image_rewriting');
define('_R', 'name_correction');
define('J_', 'recovery_points');
define('K_', 'site_scripts');
define('L_', 'site_styles');
define('M_', 'update_final');
define('N_', 'update_beta');
define('O_', 'cache');
define('_r', 'filelist');
define('P_', 'system_url');
define('Q_', 'error_limit');
define('R_', 'error_count');
define('S_', 'redraw_delay');
define('T_', 'mode');
define('U_', 'type');
define('V_', 'base');
define('W_', 'code');
define('X_', 'title');
define('Y_', 'version');
define('Z_', 'is_edited');
define('_a', 'post_max_size');
define('_b', 'upload_max_filesize');
define('_c', 'max_file_uploads');
define('_d', '_checkbox');
define('_m', 'http_ajax');
define('_n', 'source');
define('_o', 'token');
define('_p', 'sha1');
define('_q', 'html');
define('_t', '404');
define('_u', '403');
define('_v', 'ip');
define('_w', 'sip');
define('_x', 'url');
define('_y', 'name');
define('_z', 'date');
define('_A', 'size');
define('_B', 'list');
define('_C', 'file');
define('_D', 'error');
define('_E', 'value');
define('_F', 'radio');
define('_G', 'tmp_name');
define('_H', 'language_list');
define('_I', '<script');
define('_J', '<_cript');
define('_K', '</script');
define('_L', '</_cript');
define('_M', '</body>');
define('_N', '<!--~~?');
define('_O', '?~~-->');
define('__', 'adminka_');

final class a
{
    private $a;
    private $b;

    public function __construct()
    {
        $this->a['a'] = $_GET;
        $this->a['b'] = $_POST;
        $this->a['c'] = $_SERVER;
        $this->a['d'] = $_COOKIE;
        $this->a['e'] = $_FILES;
    }

    public function a($a)
    {
        if (isset($this->b['a'][$a])) return $this->b['a'][$a]; else if (isset($this->a['a'][$a])) return $this->b['a'][$a] = $this->f($this->a['a'][$a], $a);
    }

    public function b($a = false)
    {
        if ($a) {
            if (isset($this->b['b'][$a])) return $this->b['b'][$a]; else if (isset($this->a['b'][$a])) return $this->b['b'][$a] = $this->f($this->a['b'][$a], $a);
        } else if (count($this->a['b'])) return true;
    }

    public function c($a)
    {
        if (isset($this->b['c'][$a])) return $this->b['c'][$a]; else {
            $b = strtoupper($a);
            if (isset($this->a['c'][$b])) return $this->b['c'][$a] = $this->f($this->a['c'][$b], $a);
        }
    }

    public function d($a)
    {
        if (isset($this->b['d'][$a])) return $this->b['d'][$a]; else if (isset($this->a['d'][$a])) return $this->b['d'][$a] = $this->f($this->a['d'][$a], $a);
    }

    public function e($a)
    {
        if (isset($this->a['e'][$a])) return $this->a['e'][$a];
    }

    private function f($a, $b)
    {
        $c = '_' . $b;
        if (method_exists($this, $c)) return $this->$c($a); else return $a;
    }

    private function _server_protocol($a)
    {
        preg_match('~^[a-z]{4,5}/[0-9]\.[0-9]$~i', $a, $b);
        if (isset($b[0])) return $b[0];
    }

    private function _server_name($a)
    {
        preg_match('~^[a-z0-9-_.]{2,300}$~i', $a, $b);
        if (isset($b[0])) return $b[0];
    }

    private function _script_filename($a)
    {
        $b = str_replace('\\', '/', __FILE__);
        if (stripos($b, $this->a['c'][strtoupper(a_)]) === 0) return $b; else return str_replace('\\', '/', $a);
    }

    private function _document_root($a)
    {
        $a = str_replace('\\', '/', $a);
        $b = $this->c(i_);
        $c = $this->c(d_);
        $d = $this->c(j_);
        //if (__LINE__ != 1) exit;
        if (stripos($b, $c) > 0) $e = str_ireplace($c, '', $b);
        if (stripos($b, $d) > 0) $f = str_ireplace($d, '', $b);
        if (isset($e)) {
            if (isset($f)) {
                if (strlen($e) > strlen($f)) $g = $e; else$g = $f;
            } else$g = $e;
        } else if (isset($f)) $g = $f; else$g = $a;
        if (stripos($b, $a) === 0) {
            if (strlen($g) > strlen($a)) $a = $g;
        } else$a = $g;
        if (substr($a, -1) == '/') return substr($a, 0, -1);
        return $a;
    }

    private function _php_self($a)
    {
        return str_replace('\\', '/', $a);
    }

    private function _script_name($a)
    {
        return str_replace('\\', '/', $a);
    }

    private function _query_string($a)
    {
        return str_replace('\\', '/', $a);
    }

    private function _remote_addr($a)
    {
        return $this->_ip($a);
    }

    private function _server_addr($a)
    {
        return $this->_ip($a);
    }

    private function _ip($a)
    {
        preg_match('~^[a-z0-9.:]{1,40}$~i', $a, $b);
        if (isset($b[0])) return $b[0];
    }

    private function _sha1($a)
    {
        preg_match('~^[a-z0-9]{40}$~i', $a, $b);
        if (isset($b[0])) return $b[0];
    }
}

final class b
{
    private $a;
    private $b;
    private $c;
    private $d;

    public function __construct($a)
    {
        $this->a = $a;
        $this->a('Content-type:text/html;charset=utf-8');
    }

    public function a($a)
    {
        return $this->b[] = $a;
    }

    public function b($a, $b)
    {
        return $this->b[] = $this->a . ' ' . $a . ' ' . $b;
    }

    public function c($a)
    {
        return $this->b[] = 'Location:' . $a;
    }

    public function d($a, $b = false, $c = false, $d = false, $e = false, $f = false, $g = false)
    {
        $h['a'] = $a;
        $h['b'] = $b;
        $h['c'] = $g;
        $h['d'] = (int)$c;
        $h['e'] = str_replace('%2F', '/', urlencode($d));
        $h['f'] = $e;
        $h['g'] = (int)$f;
        $this->c[] = $h;
    }

    public function e($a, $b = false, $c = false)
    {
        $this->d($a, '', time() - 60 * 60, $b, $c);
    }

    public function f($a)
    {
        return $this->d = $a;
    }

    public function g()
    {
        //if (__LINE__ != 1) exit;
        if (isset($this->b)) foreach ($this->b as $a) header($a);
        if (isset($this->c)) foreach ($this->c as $b) setcookie($b['a'], $b['b'], $b['d'], $b['e'], $b['f'], $b['g'], $b['c']);
        if (isset($this->d)) print $this->d;
    }
}

final class c
{
    const a = "\n";
    const b = 'lang.ini';
    const c = 'conf.ini';
    private $a;
    private $b;
    private $c;
    private $d;
    private $e;
    private $f;

    public function __construct($a, $b)
    {
        $this->c = parse_ini_file($a . self::b, true);
        $this->d = parse_ini_file($a . self::c, true);
        $this->e = [
            'j' => '<ol><li title="{source_editor}">{type}</li><li title="{visual_editor}">text</li></ol>',
            'i' => '<ol><li>{type}</li></ol>',
            'h' => '<div id="e"><div><div><p>{extended}</p></div>{mode}<ul><li><a title="{files}">{files}</a><div id="f"><ol><li>{file_name}</li><li>{file_size}</li><li>{file_changed}</li><li>{file_menu}</li></ol><ul>{filelist}</ul></div></li><li><a title="{settings}">{settings}</a><div id="g"><fieldset><legend>{auth}</legend><dl><dt title="{new_password}">{new_password}:</dt><dd><input type="password" maxlength="14"><a></a></dd><dt title="{auth_error_limit_desc}">{login_attempts}:</dt><dd data-aa="5"><input type="text" maxlength="2" value="{auth_error_limit}"></dd><dt title="{auth_lockout_duration_desc}">{lockout_duration}:</dt><dd data-aa="1"><input type="text" maxlength="7" value="{auth_lockout_duration}"></dd><dt title="{auth_session_reset_desc}">{session_autoreset}:</dt><dd data-aa="60"><input type="text" maxlength="7" value="{auth_session_reset}"></dd><dd title="{logout_to_site_desc}" data-aa="0"><label>{logout_to_site_checkbox}<em></em>{redirect_to_site}</label></dd></dl></fieldset><fieldset><legend>{visual_editor}</legend><dl><dd title="{site_scripts_desc}" data-aa="1"><label>{site_scripts_checkbox}<em></em>{enable_scripts}</label></dd><dd title="{site_styles_desc}" data-aa="1"><label>{site_styles_checkbox}<em></em>{enable_styles}</label></dd><dd title="{link_replacing_desc}" data-aa="1"><label>{link_replacing_checkbox}<em></em>{change_links}</label></dd><dd title="{name_correction_desc}" data-aa="1"><label>{name_correction_checkbox}<em></em>{remove_symbols}</label></dd><dd title="{image_rewriting_desc}" data-aa="0"><label>{image_rewriting_checkbox}<em></em>{rewrite_file}</label></dd></dl></fieldset><fieldset><legend>{source_editor}</legend><dl><dt title="{code_redraw_delay_desc}">{redraw_delay}:</dt><dd data-aa="200"><input type="text" maxlength="7" value="{code_redraw_delay}"></dd><dt title="{code_undo_limit_desc}">{steps_for_undo}:</dt><dd data-aa="50"><input type="text" maxlength="3" value="{code_undo_limit}"></dd><dd title="{code_highlighting_desc}" data-aa="1"><label>{code_highlighting_checkbox}<em></em>{enable_highlighting}</label></dd></dl></fieldset><fieldset><legend>{file_manager}</legend><dl><dd title="{folder_size_desc}" data-aa="1"><label>{folder_size_checkbox}<em></em>{display_catalog_size}</label></dd></dl></fieldset><fieldset><legend>{system}</legend><dl><dt title="{default_file_desc}">{main_page_or_file}:</dt><dd data-aa="index.html"><input type="text" maxlength="30" value="{default_file}"></dd><dt title="{recovery_points_desc}">{number_of_recovery_point}:</dt><dd data-aa="5"><input type="text" maxlength="2" value="{recovery_points}"></dd><dd title="Не включать" data-aa="1"><label>{update_final_checkbox}<em></em>Не включать</label></dd><dd title="Не включать" data-aa="0"><label>{update_beta_checkbox}<em></em>Не включать</label></dd><dt title="{language}">{language}:</dt><dd><ul>{language_list}</ul></dd></dl></fieldset><p><input type="button" value="{save}" disabled><a title="{restore_settings}"></a></p></div></li></ul><div><ul data-ab="<li>{tagname}<i><i></i></i></li>"></ul><p><i title="{clone_block}"></i><i title="{move_up_block}"></i><i title="{move_down_block}"></i><i title="{delete_block}"></i><i title="{attributes}"></i></p><div><fieldset><legend>{attributes}</legend><dl><script type="text/template"><dt><input type="text" value="{name}" disabled></dt><dd><input type="text" value="{value}"></dd></script></dl></fieldset></div></div><ul><li><input type="button" value="{save}" title="{save}" disabled></li><li><input type="button" value="{logout}" title="{logout}" disabled data-ac="{not_save}"></li></ul><p><samp data-ad="{saving}" data-ae="{saved}" data-af="{not_saved}" data-ag="{reset_session}" data-ah="{access_closed}" data-ai="{login_again}" data-aj="{request_rejected}" data-ak="{request_blocked}" data-al="{no_response}" data-am="{not_writable}" data-an="{old_browser}" data-ao="{new_version}" data-ap="{need_update}" data-aq="{install}" data-ar="{not_install}" data-as="{download_installer}" data-at="{system_update}" data-au="{update_error}" data-av="{install_complete}" data-aw="{activation_complete}" data-ax="{attachment_domain}" data-ay="{no_connect}" data-az="{password_hashing}" data-bb="{pass_complexity}" data-bc="{uploading}" data-bd="{uploading_complete}" data-be="{uploading_error}" data-bf="{extension_error}" data-bg="{count_limit}" data-bh="{size_limit}" data-bi="{file_deletion}" data-bj="{file_deleted}" data-bk="{deletion_error}" data-bl="{file_recovery}" data-bm="{recovery_success}" data-bn="{recovery_error}" data-bo="{backup_error}" data-bp="{file_replacing}" data-bq="{incorrect_link}" data-br="{unknown_relation}" data-bs="{element_busy}" data-bt="{disable_script}" data-bu="{disable}" data-bv="{disabling_scripts}" data-bw="{scripts_disabled}" data-bx="{show_password}" data-by="{hide_password}" data-bz="{post_max_size}" data-bA="{upload_max_filesize}" data-cc="{max_file_uploads}" data-cd="{editable_attributes}" data-ce="{auth_session_reset}" data-cf="{link_replacing}" data-cg="{site_scripts}" data-ch="{site_styles}" data-ci="{logout_to_site}" data-cj="{ip}" data-ck="{sip}" data-cl="{system_url}" data-cm="{version}" data-cn="{update_final}" data-co="{update_beta}"></samp><noscript><samp>{requires_javascript}</samp></noscript><i></i></p></div></div><script src="{system_url}adminka.js?v={version}"></script>',
            'a' => '<!doctype html><html id="a"><head><title>{auth} - adminka</title><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="{system_url}adminka.css?v={version}"></head><body><fieldset><legend>{auth}</legend><ol data-cp="{error_limit}" data-cq="{error_count}"><li></li></ol><p><samp data-az="{password_hashing}" data-cr="{password_checking}" data-cs="{access_granted}" data-ct="{access_denied}" data-al="{no_response}" data-am="{not_writable}" data-cl="{system_url}">{document_root_error}</samp><noscript><samp>{requires_javascript}</samp></noscript><i></i></p><p><span>{password}:</span><input type="password" data-bb="{pass_complexity}" maxlength="14"><a data-bx="{show_password}" data-by="{hide_password}"></a></p><p><input type="button" value="{login}" disabled></p></fieldset><script src="{system_url}adminka.js?v={version}"></script></body></html>',
            'e' => '<!doctype html><html id="b"><head><title>{code} - {{code}} - adminka</title><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="{system_url}adminka.css?v={version}"></head><body><samp><span>{code}</span>{{code}}</samp>{panel}</body></html>',
            'c' => '<!doctype html><html id="d"><head><title>{title} - adminka</title><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="{system_url}adminka.css?v={version}"></head><body><iframe>{no_frames}</iframe>{panel}<script type="text/template" id="h"><base href="{base}"></script><script type="text/template" id="i">@keyframes adminka-drop{0%{opacity:0.6;}49%{opacity:0.6;}50%{opacity:1;}99%{opacity:1;}}[data-adminka-string]{outline:none;font-style:inherit;cursor:text}[data-adminka-focus]{outline:1px solid #6160d2 !important;outline-offset:8px}[data-adminka-disabled]{outline-color:#f00 !important}[data-adminka-dragover]{outline:4px solid #adc8fe;outline-offset:-4px}[data-adminka-drop]{animation:adminka-drop 70ms infinite linear}[data-adminka-object]{display:block;position:relative;background-color:#fff;opacity:0;z-index:1}</script><script type="text/template" id="j" data-cu="{is_edited}">{source}</script></body></html>',
            'd' => '<!doctype html><html id="c"><head><title>{title} - adminka</title><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><link rel="stylesheet" href="{system_url}adminka.css?v={version}"></head><body><div><ol data-ab="<li style=height:0px></li>"></ol><pre contenteditable data-cv="{redraw_delay}" data-cw="{code_highlighting}" data-cx="{code_undo_limit}"></pre></div>{panel}<script type="text/template" id="j" data-cu="{is_edited}">{source}</script></body></html>',
            'o' => '<li><ol class="u"><li><a data-cy="{url}">{name}</a></li><li data-cz="{size}"></li><li>{date}</li><li><i title="{recover_backup}"></i><i title="{recovery_confirm}"></i><i title="{recovery_cancel}"></i></li></ol><ul>{list}</ul></li>',
            'n' => '<li><ol class="s"><li><a data-cy="{url}">{name}</a></li><li data-cz="{size}"></li><li>{date}</li><li><i title="{add_file}"></i></li></ol><ul></ul></li>',
            'b' => '<li><ol class="v"><li><a data-cy="{url}">{name}</a></li><li data-cz="{size}"></li><li>{date}</li><li><i title="{delete_file}"></i><i title="{deletion_confirm}"></i><i title="{deletion_cancel}"></i></li></ol></li>',
            'm' => '<li title="{{lang}}">{radio}{lang}</li>',
            'l' => '<input type="radio" name="{name}" value="{value}">',
            'k' => '<input type="radio" name="{name}" value="{value}" checked>',
            'g' => '<input type="checkbox">',
            'f' => '<input type="checkbox" checked>'
        ];
        $this->a['a'] = $a;
        $this->a['b'] = $this->i(a_);
        //if (__LINE__ != 1) exit;
        if (!$this->a['b']) $this->a['b'] = $b;
        $this->a['c'] = str_ireplace($this->a['b'], '', $this->a['a']);
        $this->a['d'] = $this->h($a);
        $this->a['e'] = $this->h($this->a['c']);
    }

    public function __destruct()
    {
        if ($this->f) $this->k();
    }

    public function a()
    {
        return $this->a['b'];
    }

    public function b()
    {
        return $this->a['a'];
    }

    public function c($a = false)
    {
        return $this->a['c'];
    }

    public function d()
    {
        return $this->a['d'];
    }

    public function e()
    {
        return $this->a['e'];
    }

    public function f()
    {
        return $this->a['a'] . 'backup/';
    }

    public function g()
    {
        return $this->a['c'] . 'backup/';
    }

    public function h($a)
    {
        if (substr_count($a, '/') > 2) return dirname($a) . '/'; else return '/';
    }

    public function i($a, $b = false)
    {
        if ($b) {
            if (isset($this->d[$b][$a])) return $this->d[$b][$a];
        } else if (isset($this->d[$a])) return $this->d[$a];
    }

    public function j($a, $b, $c = false)
    {
        if ($c) {
            if (isset($this->d[$c])) {
                $this->f = true;
                return $this->d[$c][$a] = $b;
            }
        } else {
            $this->f = true;
            return $this->d[$a] = $b;
        }
    }

    private function k()
    {
        foreach ($this->d as $a => $b) if (!is_array($b)) $c[] = $a . ' = ' . $b . self::a . self::a;
        foreach ($this->d as $a => $b) {
            if (is_array($b)) {
                $c[] = '[' . $a . ']' . self::a . self::a;
                foreach ($b as $d => $e) $c[] = "\t" . $d . ' = ' . $e . self::a;
                $c[] = self::a;
            }
        }
        if ($f = fopen($this->a['a'] . self::c, 'w')) {
            flock($f, LOCK_EX);
            fwrite($f, implode('', $c));
            flock($f, LOCK_UN);
            fclose($f);
        }
    }

    public function l()
    {
        return is_writable($this->a['a'] . self::c);
    }

    public function m($a)
    {
        if (isset($this->e[$a])) return $this->e[$a];
    }

    public function n($a, $b)
    {
        foreach ($b as $c => $d) $a = str_ireplace('{' . $c . '}', $d, $a);
        return $a;
    }

    public function o($a, $b)
    {
        preg_match_all('~\{([a-z0-9_]{2,30})\}~i', $a, $c);
        if ($c[1]) {
            $c[1] = array_unique($c[1]);
            foreach ($c[1] as $d) if ($e = $this->p($d, $b)) $a = str_ireplace('{' . $d . '}', $e, $a);
        }
        return $a;
    }

    public function p($a, $b)
    {
        if (isset($this->c[$b][$a])) return $this->c[$b][$a];
    }
}

final class d
{
    const a = '2.12e';
    private $a;
    private $b;
    private $c;
    private $d;
    private $e;

    public function __construct($a, $b, $c)
    {
        $this->b = $a;
        $this->c = $b;
        $this->a = $c;
        $this->d = $this->g();
        $this->e = $this->h();
    }

    public function a()
    {
        $a = $this->b->d(__ . o_, _p);
        if ($a && $a == $this->a->i(o_)) $this->b(); else {
            $b = time();
            $c = unserialize(urldecode($this->a->i(t_)));
            $d = $this->a->i(u_);
            $e = $this->b->c(g_);
            if ($c && isset($c[$e])) $f = $c[$e]; else$f = 0;
            if ($this->b->b() && $this->b->c(_m)) {
                $g = $this->b->b(n_, _p);
                if ($g && ($f < $d || $this->a->i(s_) + ($this->a->i(v_) * 60) < $b)) {
                    $h = $this->a->i(n_);
                    $i = $this->a->i(q_) * 1;
                    $j = $this->a->i(p_) * 1;
                    $k = $j - $i;
                    for ($l = 0; $l < $k; $l++) $g = sha1($g);
                    if ($h == $g) {
                        if ($this->a->l()) {
                            $this->m();
                            if (isset($c[$e])) {
                                unset($c[$e]);
                                $this->a->j(t_, urlencode(serialize($c)));
                            }
                            if ($i < 5) $this->a->j(q_, 15000); else$this->a->j(q_, $i - 1);
                            $this->a->j(r_, $b);
                            $this->a->j(O_, '');
                        } else {
                            $this->c->a('X-a:1');
                            $this->c->b(404, $this->a->p(_t, 'en'));
                        }
                    } else {
                        $this->a->j(s_, $b);
                        $c[$e] = $f + 1;
                        $this->a->j(t_, urlencode(serialize($c)));
                        $this->c->b(404, $this->a->p(_t, 'en'));
                    }
                } else$this->c->b(404, $this->a->p(_t, 'en'));
            } else {
                if (!$this->a->i(x_) || $this->b->c(e_) && $this->b->c(f_) && preg_match('~Chrome|Firefox|Opera|Safari|AppleWebKit|Trident|MSIE~i', $this->b->c(f_))) {
                    if ($f < $d || $this->a->i(s_) + ($this->a->i(v_) * 60) < $b) {
                        if ($this->b->c(c_) === substr($this->a->c(), 0, -1)) throw new Exception($this->a->c(), 307);
                        $m[P_] = $this->a->c();
                        $m[Q_] = $d;
                        $m[R_] = $f;
                        $m[p_] = $this->a->i(q_);
                        $m[Y_] = self::a;
                        $n = $this->a->m('a');
                        $n = $this->a->n($n, $m);
                        $n = $this->a->o($n, $this->d);
                        $this->c->f($n);
                    } else throw new Exception(false, 403);
                } else throw new Exception(false, 403);
            }
        }
    }

    public function b()
    {
        $aa = $this->b->a('q');
        $ab = $this->a->d() . $aa;
        if (!$aa || !preg_match('~\.[a-z]{2,5}$~i', $aa)) {
            if ($this->b->c(i_) != str_replace('\\', '/', __FILE__)) $this->k();
            $ac = $this->a->d() . $this->a->i(D_);
            if (!file_exists($ac) && ($ad = $this->j())) throw new Exception($this->a->c() . $this->i() . $ad, 307); else throw new Exception($this->a->c() . $this->i() . $this->a->i(D_), 307);
        }
        if (stripos($aa, substr($this->a->c(), strripos(substr($this->a->c(), 0, -1), '/') + 1)) === 0) throw new Exception($this->a->c() . $this->i() . $this->a->i(D_), 307);
        if ($this->b->c(_m)) {
            if ($this->b->b('reload')) $this->m(); else if ($this->b->b('logout')) $this->n(); else if (($ae = $this->b->b('save')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                $ae = str_replace(_L, _K, base64_decode(str_replace('_', 'a', $ae)));
                $ae = str_replace(_J, _I, $ae);
                if ($this->q(strtolower(substr($ab, strripos($ab, '.') + 1)))) {
                    if ($this->_a($aa)) {
                        if (is_writable($ab) && $ag = fopen($ab, 'w')) {
                            flock($ag, LOCK_EX);
                            fwrite($ag, $ae);
                            flock($ag, LOCK_UN);
                            fclose($ag);
                            $this->a->j(O_, '');
                        } else {
                            $this->c->a('X-a:1');
                            $this->c->b(404, $this->a->p(_t, 'en'));
                        }
                    } else {
                        $this->c->a('X-b:1');
                        $this->c->b(404, $this->a->p(_t, 'en'));
                    }
                } else$this->c->b(404, $this->a->p(_t, 'en'));
            } else if ($ah = $this->b->b('open')) {
                $ah = rawurldecode($ah);
                $this->c->f($this->w($ah));
            } else if (($ah = $this->b->b('upload')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                $ah = rawurldecode($ah);
                $ai = $this->a->d() . substr($ah, strlen($this->a->e()));
                $aj = $this->b->e(_C);
                if ($ak = count($aj) && is_dir($ai)) {
                    $al = '';
                    $am = $this->a->m('b');
                    $an = str_replace(' ', '', str_replace(',', '|', $this->a->i(C_)));
                    foreach ($aj[_G] as $ao => $ap) {
                        if ($this->q(strtolower(substr($aj[_y][$ao], strripos($aj[_y][$ao], '.') + 1)))) {
                            if (!$aj[_D][$ao]) {
                                $ab = $ai . $aj[_y][$ao];
                                if ($this->_a(substr($ah . $aj[_y][$ao], strlen($this->a->e())))) {
                                    move_uploaded_file($ap, $ab);
                                    $aq[_y] = $aj[_y][$ao];
                                    $aq[_z] = filemtime($ab);
                                    $aq[_A] = filesize($ab);
                                    preg_match('~\.(?:' . $an . ')$~i', $aq[_y], $ar);
                                    if (isset($ar[0])) $aq[_x] = $this->a->c() . $this->i() . substr($ah, strlen($this->a->e())) . $aq[_y]; else$aq[_x] = $ah . $aq[_y];
                                    $al .= $this->a->o($this->a->n($am, $aq), $this->d);
                                } else$as = true;
                            } else$at = true;
                        } else$au = true;
                        if (isset($al)) {
                            $this->a->j(O_, '');
                            $this->c->a('X-c:' . $this->y($ah));
                            $this->c->f($al);
                        }
                        if (isset($au)) $this->c->a('X-d:1'); else if (isset($as)) $this->c->a('X-b:1'); else if (isset($at)) $this->c->a('X-e:1');
                    }
                } else$this->c->b(404, $this->a->p(_t, 'en'));
            } else if (($av = $this->b->b('remove')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                $av = rawurldecode($av);
                if ($this->q(strtolower(substr($av, strripos($av, '.') + 1)))) {
                    $av = str_replace($this->a->c(), $this->a->e(), $av);
                    $ab = $this->a->d() . substr($av, strlen($this->a->e()));
                    if ($this->_a(substr($av, strlen($this->a->e())))) {
                        if (is_file($ab) && unlink($ab)) {
                            $this->a->j(O_, '');
                            $this->c->a('X-c:' . $this->y(dirname($av) . '/'));
                        } else$this->c->b(404, $this->a->p(_t, 'en'));
                    } else {
                        $this->c->a('X-b:1');
                        $this->c->b(404, $this->a->p(_t, 'en'));
                    }
                } else {
                    $this->c->a('X-d:1');
                    $this->c->b(404, $this->a->p(_t, 'en'));
                }
            } else if (($av = $this->b->b('replace')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                $av = rawurldecode($av);
                $aw = $this->b->e(_C);
                if (isset($aw[_G]) && $aw[_D] < 1) {
                    if ($this->q(strtolower(substr($aw[_y], strripos($aw[_y], '.') + 1)))) {
                        if (stripos($av, $this->b->c(k_) . $this->a->e())) {
                            $ax = explode($this->b->c(k_) . $this->a->e(), $av);
                            if (isset($ax[1]) && file_exists($this->a->d() . $ax[1])) {
                                if ($this->_a($ax[1])) {
                                    $ay = dirname($this->a->d() . $ax[1]) . '/';
                                    $az = $this->_c($ay, $aw[_y]);
                                    move_uploaded_file($aw[_G], $az);
                                    $this->a->j(O_, '');
                                    $this->c->f(dirname($av) . '/' . basename($az));
                                } else {
                                    $this->c->a('X-b:1');
                                    $this->c->b(404, $this->a->p(_t, 'en'));
                                }
                            } else$this->c->b(404, $this->a->p(_t, 'en'));
                        } else {
                            $az = $this->_c($this->a->d(), $aw[_y]);
                            move_uploaded_file($aw[_G], $az);
                            $this->a->j(O_, '');
                            $this->c->f($this->a->e() . $aw[_y]);
                        }
                    } else {
                        $this->c->a('X-d:1');
                        $this->c->b(404, $this->a->p(_t, 'en'));
                    }
                } else$this->c->b(404, $this->a->p(_t, 'en'));
            } else if (($aA = $this->b->b('settings')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                if ($aA[n_]) {
                    $aB = $this->a->i(n_);
                    $aC = $this->a->i(p_) - $this->a->i(q_);
                    for ($aD = 0; $aD < $aC; $aD++) $aA[n_] = sha1($aA[n_]);
                    if ($aA[n_] != $aB) $this->a->j(n_, $aA[n_]);
                }
                if ($aA[m_] && $aA[m_] != $this->d) {
                    if (stripos($aE = $this->a->i(m_), ',') && stripos($aE, $aA[m_]) !== false) {
                        if ($aA[m_] != $this->b->c(e_)) $this->c->d(__ . m_, $aA[m_], time() + 60 * 60 * 24 * 365, $this->a->c(), false, false, true); else$this->c->e(__ . m_, $this->a->c());
                    } else$this->c->b(404, $this->a->p(_t, 'en'));
                }
                if ($this->a->i(D_) !== null && preg_match('~^.{1,30}$~i', $aA[D_], $ar) && isset($ar[0])) $this->a->j(D_, $aA[D_]); else$this->c->b(404, $this->a->p(_t, 'en'));
                unset($aA[n_], $aA[m_], $aA[D_]);
                foreach ($aA as $ao => $aF) {
                    if ($this->a->i($ao) !== null && preg_match('~^[0-9]{1,7}$~i', $aF, $ar) && isset($ar[0])) $this->a->j($ao, $aF); else$this->c->b(404, $this->a->p(_t, 'en'));
                }
            } else if (($ah = $this->b->b('recovery')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                $ah = rawurldecode($ah);
                $ai = $this->a->d() . substr($ah, strlen($this->a->e()));
                if (is_dir($ai) && is_writable($this->a->f()) && $aG = opendir($ai)) {
                    while (($aH = readdir($aG)) !== false) {
                        if ($aH != '.' && $aH != '..' && is_file($ai . $aH)) {
                            $aH = str_ireplace('ꜜ', '[~]', $aH);
                            if (substr($aH, 0, 3) == '[~]') {
                                $ab = $this->a->d() . str_ireplace('⁄', '/', substr($aH, 3));
                                if (file_exists($ab)) if (!unlink($ab)) $aI = true;
                            } else {
                                $ab = $this->a->d() . str_ireplace('⁄', '/', $aH);
                                if (!copy($ai . $aH, $ab)) $aI = true;
                            }
                            if (!unlink($ai . str_ireplace('[~]', 'ꜜ', $aH))) $aI = true;
                        }
                    }
                    closedir($aG);
                    $this->a->j(O_, '');
                    if (!isset($aI)) {
                        if (!rmdir($ai)) $this->c->b(404, $this->a->p(_t, 'en'));
                    } else$this->c->b(404, $this->a->p(_t, 'en'));
                } else$this->c->b(404, $this->a->p(_t, 'en'));
            } else if (($aJ = $this->b->b('scripts')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                if ($this->a->i(K_) !== null) $this->a->j(K_, '0'); else$this->c->b(404, $this->a->p(_t, 'en'));
            } /*else if (($aK = $this->b->b('install')) && ($af = $this->b->b(_o, _p)) && ($af == $this->b->d(__ . _o, _p))) {
                $this->c->e(__ . _o);
                $aw = $this->a->b() . 'update.php';
                preg_match('~^[a-z0-9+=/_]+$~i', $aK, $ar);
                if (isset($ar[0]) && ($aK = base64_decode(str_replace('_', 'a', $aK))) && ($ag = fopen($aw, 'w'))) {
                    flock($ag, LOCK_EX);
                    $aL = fwrite($ag, $aK);
                    flock($ag, LOCK_UN);
                    fclose($ag);
                    if ($aL) {
                        $aq = include $aw;
                        if ($aq == _D) $this->c->b(404, $this->a->p(_t, 'en')); else if (file_exists($this->a->d() . $aq)) $this->c->f($this->a->c() . $this->i() . $aq);
                        unlink($aw);
                    } else$this->c->b(404, $this->a->p(_t, 'en'));
                } else$this->c->b(404, $this->a->p(_t, 'en'));
            }*/ else$this->c->b(404, $this->a->p(_t, 'en'));
        } else {
            $this->m();
            if (file_exists($ab)) {
                $aM = strtolower(substr($ab, strripos($ab, '.') + 1));
                if ($this->q($aM)) {
                    $aN = str_replace(' ', '', str_replace(',', '|', $this->a->i(_s)));
                    preg_match('~^' . $aN . '$~i', $aM, $ar);
                    if (isset($ar[0])) {
                        $aO = $this->b->d(__ . _q);
                        $aP = $this->b->b('switch');
                        if ($aO) {
                            if ($aP === '0') {
                                $this->c->e(__ . _q, $this->a->c());
                                $this->c($ab);
                            } else$this->d($ab);
                        } else {
                            if ($aP === '1') {
                                $this->c->d(__ . _q, 1, time() + 60 * 60 * 24 * 90, $this->a->c(), false, false, true);
                                $this->d($ab);
                            } else$this->c($ab);
                        }
                    } else$this->d($ab);
                } else$this->e(_u);
            } else$this->e(_t);
        }
    }

    public function c($a)
    {
        $b[X_] = $this->a->p('visual_editor', $this->d);
        $b[P_] = $this->a->c();
        $b[Y_] = self::a;
        $b[V_] = $this->a->e();
        $c = $this->b->a('q');
        if ($d = strripos($c, '/')) $b[V_] .= substr($c, 0, $d + 1);
        $b['panel'] = $this->r($a);
        $b[_n] = $this->o();
        if (!$b[_n]) {
            $b[_n] = $this->p($a);
            $b[Z_] = '';
        } else$b[Z_] = '1';
        $b[_n] = str_replace('{', '!~!', $b[_n]);
        $e = $this->a->m('c');
        $e = $this->a->n($e, $b);
        $e = $this->a->o($e, $this->d);
        $e = str_replace('!~!', '{', $e);
        $this->c->f($e);
    }

    public function d($a)
    {
        $b[X_] = $this->a->p('source_editor', $this->d);
        $b[P_] = $this->a->c();
        $b[Y_] = self::a;
        $b[S_] = $this->a->i(y_);
        $b[A_] = $this->a->i(A_);
        $b[z_] = $this->a->i(z_);
        $b['panel'] = $this->r($a);
        $b[_n] = $this->o();
        if (!$b[_n]) {
            $b[_n] = $this->p($a);
            $b[Z_] = '';
        } else$b[Z_] = '1';
        $b[_n] = str_replace('{', '!~!', $b[_n]);
        $c = $this->a->m('d');
        $c = $this->a->n($c, $b);
        $c = str_replace('!~!', '{', $c);
        $this->c->f($c);
    }

    public function e($a)
    {
        $b[W_] = $a;
        $b[P_] = $this->a->c();
        $b[Y_] = self::a;
        $b['panel'] = $this->r($a);
        $c = $this->a->m('e');
        $c = $this->a->n($c, $b);
        return $this->a->o($c, $this->d);
    }

    public function f($a)
    {
        $this->c->b($a->getCode(), $this->a->p($a->getCode(), 'en'));
        if ($b = $a->getMessage()) $this->c->c($b);
        $c[W_] = $a->getCode();
        $c[P_] = $this->a->c();
        $c[Y_] = self::a;
        $c['panel'] = '';
        $d = $this->a->m('e');
        $d = $this->a->n($d, $c);
        return $this->c->f($this->a->o($d, $this->d));
    }

    private function g()
    {
        $a = $this->a->i(m_);
        if (stripos($a, ',')) {
            $b = $this->b->d(__ . m_);
            if ($b && stripos($a, $b) !== false) return $b; else {
                $c = substr($this->b->c(e_), 0, 2);
                if (stripos($a, $c) !== false) return $c;
            }
        }
        return substr($a, 0, 2);
    }

    private function h()
    {
        $a = $this->a->i(F_);
        if ($a === '1') return 1; else if ($a === '0') return 0; else {
            if ((stripos($this->b->c(b_), 'q=') === 0) && (stripos($this->b->c(c_), $this->b->c(b_)) === false)) return 1; else return 0;
        }
    }

    private function i()
    {
        if (!$this->e) return '?q='; else return '';
    }

    private function j()
    {
        $a = $this->a->d();
        if ($b = opendir($a)) {
            $c = [];
            $d = [];
            $e = str_replace(' ', '', str_replace(',', '|', $this->a->i(_s)));
            $f = str_replace(' ', '', str_replace(',', '|', $this->a->i(C_)));
            while (($g = readdir($b)) !== false) {
                if ($g != '.' && $g != '..') {
                    if (is_file($a . $g)) {
                        if (preg_match('~^index\.(?:' . $e . ')$~i', $g)) {
                            closedir($b);
                            return $g;
                        } else if (preg_match('~\.(?:' . $e . ')$~i', $g)) $c[] = $g; else if (preg_match('~\.(?:' . $f . ')$~i', $g)) $d[] = $g;
                    }
                }
            }
            closedir($b);
            if (isset($c[0])) return $c[0]; else if (isset($d[0])) return $d[0];
        }
    }

    private function k()
    {
        $a = $this->a->b() . '.htaccess';
        if (file_exists($a)) {
            $b = file_get_contents($a);
            preg_match('~RewriteBase (.+?)\n~i', $b, $c);
            if (isset($c[0]) && isset($c[1])) {
                if ($c[1] != $this->a->c()) {
                    $b = str_replace($c[0], 'RewriteBase ' . $this->a->c() . "\n", $b);
                    $this->l($b);
                }
            } else {
                $b = preg_replace('~(RewriteEngine .+?\n)~i', '$1' . "\n" . 'RewriteBase ' . $this->a->c() . "\n", $b);
                $this->l($b);
            }
        }
    }

    private function l($a)
    {
        if ($b = fopen($this->a->b() . '.htaccess', 'w')) {
            flock($b, LOCK_EX);
            fwrite($b, $a);
            flock($b, LOCK_UN);
            fclose($b);
        }
    }

    private function m()
    {
        $a = sha1(time() . mt_rand());
        $this->a->j(o_, $a);
        $this->c->d(__ . o_, $a, time() + 60 * $this->a->i(w_), $this->a->c(), false, false, true);
    }

    private function n()
    {
        $this->a->j(o_, '');
        $this->c->e(__ . o_, $this->a->c());
    }

    private function o()
    {
        $a = $this->b->b('switch');
        if (is_numeric($a)) {
            $b = $this->b->b(_n);
            if ($b && ($c = $this->b->b(_o)) && $c == $this->b->d(__ . _o)) {
                $b = base64_decode(str_replace('_', 'a', $b));
                $this->c->a('X-f:0');
                $this->c->e(__ . _o);
                return $b;
            }
        }
    }

    private function p($a)
    {
        $b = file_get_contents($a);
        preg_match('~<meta[^>]+utf-8~i', $b, $c);
        preg_match('~<meta[^>]+windows-1251~i', $b, $d);
        if (!isset($c[0]) && isset($d[0])) {
            $b = preg_replace('~(<meta[^>]+)windows-1251~i', '$1utf-8', $b);
            $b = iconv('Windows-1251', 'UTF-8', $b);
        }
        $b = str_replace(_K, _L, $b);
        return str_replace(_I, _J, $b);
    }

    private function q($a)
    {
        $b = $this->a->i(B_);
        if (!$b || preg_match('~(?:^|,\s*)' . $a . '(?:\s*,|$)~i', $b)) return true;
    }

    private function r($aa)
    {
        $ab[T_] = $this->s($aa);
        $ab[_r] = $this->v();
        $ab[P_] = $this->a->c();
        $ab[Y_] = self::a;
        $ab[_b] = $this->u(ini_get(_b));
        $ab[_c] = ini_get(_c);
        /*if (md5(str_replace('www.', '', $this->b->c(k_))) != 'xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx') $ac[_a] = '0';*/
        $ab[p_] = $this->a->i(q_);
        $ab[u_] = $this->a->i(u_);
        $ab[v_] = $this->a->i(v_);
        $ab[w_] = $this->a->i(w_);
        $ab[G_] = $this->a->i(G_);
        if ($ab[G_]) $ab[G_ . _d] = $this->a->m('f'); else$ab[G_ . _d] = $this->a->m('g');
        $ab[K_] = $this->a->i(K_);
        if ($ab[K_]) $ab[K_ . _d] = $this->a->m('f'); else$ab[K_ . _d] = $this->a->m('g');
        $ab[L_] = $this->a->i(L_);
        if ($ab[L_]) $ab[L_ . _d] = $this->a->m('f'); else$ab[L_ . _d] = $this->a->m('g');
        $ab[H_] = $this->a->i(H_);
        if ($ab[H_]) $ab[H_ . _d] = $this->a->m('f'); else$ab[H_ . _d] = $this->a->m('g');
        if ($this->a->i(_R)) $ab[_R . _d] = $this->a->m('f'); else$ab[_R . _d] = $this->a->m('g');
        if ($this->a->i(I_)) $ab[I_ . _d] = $this->a->m('f'); else$ab[I_ . _d] = $this->a->m('g');
        if (!$this->f) return;
        $ab[y_] = $this->a->i(y_);
        $ab[z_] = $this->a->i(z_);
        if ($this->a->i(A_)) $ab[A_ . _d] = $this->a->m('f'); else$ab[A_ . _d] = $this->a->m('g');
        if ($this->a->i(_Q)) $ab[_Q . _d] = $this->a->m('f'); else$ab[_Q . _d] = $this->a->m('g');
        $ab[D_] = $this->a->i(D_);
        $ab[J_] = $this->a->i(J_);
        $ab[M_] = $this->a->i(M_);
        if ($ab[M_]) $ab[M_ . _d] = $this->a->m('f'); else$ab[M_ . _d] = $this->a->m('g');
        $ab[N_] = $this->a->i(N_);
        if ($ab[N_]) $ab[N_ . _d] = $this->a->m('f'); else$ab[N_ . _d] = $this->a->m('g');
        $ab[_v] = $this->b->c(g_);
        $ab[_w] = $this->b->c(h_);
        if (isset($ab[_a])) $ab[_a] .= $this->u(ini_get(_a)); else$ab[_a] = $this->u(ini_get(_a));
        $ab[_H] = $this->t();
        $ab[_P] = preg_replace('~\s~', '', $this->a->i(_P));
        $ad = $this->a->m('h');
        $ad = $this->a->n($ad, $ab);
        return $this->a->o($ad, $this->d);
    }

    private function s($a)
    {
        if (is_numeric($a)) {
            $b[U_] = $a;
            $c = $this->a->m('i');
        } else {
            $d = strtolower(substr($a, strripos($a, '.') + 1));
            $e = str_replace(' ', '', str_replace(',', '|', $this->a->i(_s)));
            preg_match('~^' . $e . '$~i', $d, $f);
            if (isset($f[0])) $c = $this->a->m('j'); else$c = $this->a->m('i');
            if ($d == 'htm') $b[U_] = _q; else$b[U_] = $d;
        }
        $c = $this->a->n($c, $b);
        return $this->a->o($c, $this->d);
    }

    private function t()
    {
        $a = '';
        $b = explode(',', $this->a->i(m_));
        //if (__LINE__ != 1) exit;
        $c[_y] = m_;
        foreach ($b as $d) {
            $c[_E] = trim($d);
            if ($this->d == $c[_E]) $e = $this->a->m('k'); else$e = $this->a->m('l');
            $f[_F] = $this->a->n($e, $c);
            $f[m_] = $c[_E];
            $g = $this->a->m('m');
            $g = $this->a->n($g, $f);
            $a .= $this->a->o($g, $this->d);
        }
        return $a;
    }

    private function u($a)
    {
        $a = strtolower(trim($a));
        $b = (int)$a;
        switch ($a[strlen($a) - 1]) {
            case'm':
                return $b * 1048576;
            case'k':
                return $b * 1024;
            case'g':
                return $b * 1073741824;
            default:
                return $b;
        }
    }

    private function v()
    {
        $a = $this->a->e();
        $b = $this->a->d();
        if ($a == '/') $c[_y] = $this->b->c(k_); else$c[_y] = substr($a, strrpos(substr($a, 0, -1), '/') + 1, -1);
        $c[_z] = filemtime($b);
        $c[_x] = $a;
        $c[_A] = '';
        $d = $this->a->b();
        if ($e = opendir($d)) {
            while (($f = readdir($e)) !== false) {
                if ($f != '.' && $f != '..' && is_file($d . $f) && (substr($f, 0, 9) == 'adminka' || substr($f, 0, 5) == 'index') && ((substr($f, -2, -1) == 'h' && filesize($d . $f) != 36307) || (substr($f, -2, -1) == 'j' && filesize($d . $f) != 66258) || (substr($f, -3, -2) == 'c' && filesize($d . $f) != 42150))) {
                    $c[_A] = '0' . $c[_A];
                    break;
                }
                $this->f = true;
            }
            closedir($e);
        }
        $g = $this->a->m('n');
        $g = $this->a->n($g, $c);
        return $this->a->o($g, $this->d);
    }

    private function w($aa)
    {
        $ab = $this->a->d() . substr($aa, strlen($this->a->e()));
        $ac = [];
        $ad = [];
        $ae = str_replace(' ', '', str_replace(',', '|', $this->a->i(C_)));
        if ($af = opendir($ab)) {
            while (($ag = readdir($af)) !== false) {
                if ($ag != '.' && $ag != '..') {
                    $ah = [];
                    $ah[_y] = $ag;
                    $ah[_z] = filemtime($ab . $ag);
                    if (is_file($ab . $ag)) {
                        preg_match('~\.(?:' . $ae . ')$~i', $ag, $ai);
                        if (isset($ai[0])) $ah[_x] = $this->a->c() . $this->i() . substr($aa, strlen($this->a->e())) . $ag; else$ah[_x] = $aa . $ag;
                        $ah[_A] = filesize($ab . $ag);
                        $ad[] = $ah;
                    } else if (is_dir($ab . $ag) && !is_link($ab . $ag)) {
                        $ah[_x] = $aa . $ag . '/';
                        $ah[_A] = $this->y($ah[_x]);
                        $ac[] = $ah;
                    }
                }
            }
            closedir($af);
        }
        $aj = '';
        if (count($ac)) {
            $ac = $this->x($ac);
            $ak = $this->a->m('n');
            $al = $this->a->m('o');
            foreach ($ac as $am) {
                if ($am[_x] == $this->a->g()) {
                    $an = $al;
                    $am[_B] = $this->w($am[_x]);
                } else$an = $ak;
                $aj .= $this->a->o($this->a->n($an, $am), $this->d);
            }
        }
        if (count($ad)) {
            $ad = $this->x($ad);
            $ao = $this->a->m('b');
            foreach ($ad as $ap) $aj .= $this->a->o($this->a->n($ao, $ap), $this->d);
        }
        if ($ab == $this->a->d()) $this->c->a('X-c:' . $this->y($aa));
        return $aj;
    }

    private function x($a)
    {
        $b = [];
        $c = [];
        foreach ($a as $d) $b[] = $d[_y];
        asort($b);
        foreach ($b as $e) foreach ($a as $d) if ($e == $d[_y]) $c[] = $d;
        return $c;
    }

    private function y($a)
    {
        if ($this->a->i(_Q)) {
            $b = $this->a->i(O_);
            if (!$b) {
                $b = $this->z($this->a->e());
                $this->a->j(O_, urlencode(serialize($b)));
            } else$b = unserialize(urldecode($b));
            return $b[$a];
        } else return '';
    }

    private function z($a)
    {
        $b = $this->a->d() . substr($a, strlen($this->a->e()));
        $c = [];
        $c[$a] = 0;
        if ($d = opendir($b)) {
            while (($e = readdir($d)) !== false) {
                if ($e != '.' && $e != '..') {
                    if (is_file($b . $e)) $c[$a] += filesize($b . $e); else if (is_dir($b . $e . '/') && !is_link($b . $e)) {
                        $f = $this->z($a . $e . '/');
                        $c[$a] += $f[$a . $e . '/'];
                        $c = array_merge($c, $f);
                    }
                }
            }
            closedir($d);
        }
        return $c;
    }

    private function _a($a)
    {
        $b = $this->a->i(J_);
        if ($b && $b > 0) {
            $c = $this->a->f();
            if (is_dir($c) || is_writable($this->a->b()) && mkdir($c)) {
                $d = date('y.m.d.H.i', $this->a->i(r_));
                $e = $c . $d . '/';
                if (is_dir($e) || is_writable($c) && mkdir($e)) {
                    $this->_b($c, $b);
                    if ($f = opendir($e)) {
                        $g = $e . str_ireplace('/', '⁄', $a);
                        $h = $e . 'ꜜ' . str_ireplace('/', '⁄', $a);
                        while (($i = readdir($f)) !== false) {
                            $j = $e . $i;
                            if ($i != '.' && $i != '..' && is_file($j) && file_exists($j) && ($j == $g || $j == $h)) return true;
                        }
                        closedir($f);
                    }
                    $k = $this->a->d() . $a;
                    if (file_exists($k)) {
                        if (copy($k, $e . str_ireplace('/', '⁄', $a))) return true;
                    } else if (fopen($e . 'ꜜ' . str_ireplace('/', '⁄', $a), 'w')) return true;
                }
            }
        } else return true;
    }

    private function _b($a, $b)
    {
        $c = [];
        if ($d = opendir($a)) {
            while (($e = readdir($d)) !== false) if ($e != '.' && $e != '..' && is_dir($a . $e)) array_push($c, $e);
            closedir($d);
        }
        $f = count($c) - $b;
        if ($f > 0) {
            asort($c);
            $c = array_slice($c, 0, $f);
            if ($d = opendir($a)) {
                while (($e = readdir($d)) !== false) {
                    if ($e != '.' && $e != '..' && is_dir($a . $e)) {
                        foreach ($c as $g) {
                            if ($e == $g) {
                                $h = $a . $e . '/';
                                if ($i = opendir($h)) while (($j = readdir($i)) !== false) if ($j != '.' && $j != '..') if (!is_file($h . $j) || !unlink($h . $j)) $k = true;
                                closedir($i);
                                if (!isset($k)) rmdir($h); else unset($k);
                            }
                        }
                    }
                }
                closedir($d);
            }
        }
    }

    private function _c($a, $b)
    {
        if ($this->a->i(_R)) {
            preg_match('~\.[a-z0-9]{1,5}$~i', $b, $c);
            if (!isset($c[0])) {
                $c[1] = $b;
                $c[2] = '';
            } else preg_match('~^(.+)(\.[a-z0-9]{1,5})$~i', $b, $c);
            $c[1] = preg_replace('~[^a-z0-9]+~i', '-', $c[1]);
            $c[1] = preg_replace('~^-~i', '', $c[1]);
            $c[1] = preg_replace('~-$~i', '', $c[1]);
            if (!preg_match('~[^-]+~i', $c[1])) $c[1] = 'image';
            $b = $c[1] . $c[2];
        }
        $b = preg_replace('~[%#]~i', '', $b);
        $d = $a . $b;
        if (file_exists($d)) {
            if (!$this->a->i(I_)) {
                preg_match('~\.[a-z0-9]{1,5}$~i', $d, $c);
                if (isset($c[0])) $e = preg_replace('~\.([a-z0-9]{1,5})$~i', '{prefix}.$1', $d); else$e = $d . '{prefix}';
                for ($f = 2; file_exists($d); $f++) $d = preg_replace('~\{prefix\}~i', '-' . $f, $e);
            }
        }
        return $d;
    }
}

$a = new a();
$b = new b($a->c(l_));
$c = new c(dirname($a->c(i_)) . '/', $a->c(a_));
$d = new d($a, $b, $c);
try {
    $d->a();
} catch (Exception$e) {
    $d->f($e);
}
$b->g(); ?>
