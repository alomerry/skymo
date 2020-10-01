<?php
/**
 * <strong style='color:red'>Handsome主题美化插件</strong>
 * 
 * @package Sky.Mo 
 * @author Alomerry
 * @version 1.1.0
 * @link http://alomerry.com
 * version 1.0.0 基本特效
 * version 1.1.0 新增配置单个特效
 * https://api.github.com/repos/alomerry/skymo/releases/latest
 */
class SkyMo_Plugin implements Typecho_Plugin_Interface
{

    const STATIC_DIR = '/usr/plugins/SkyMo';

    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
        self::installDB();

        Typecho_Plugin::factory('Widget_Archive')->header = array(__CLASS__, 'header');
        Typecho_Plugin::factory('Widget_Archive')->footer = array(__CLASS__, 'footer');
        return "插件启动成功";
    }
    
    /**
     * 禁用插件方法,如果禁用失败,直接抛出异常
     * 
     * @static
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function deactivate(){

        
        return "插件禁用成功";
    }
    
    /**
     * 获取插件配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form 配置面板
     * @return void
     */
    public static function config(Typecho_Widget_Helper_Form $form)
    {

        $html = '<p>欢迎使用 Handsome 主题美化插件 SkyMo。</p>'.
        '<p>此插件帮助你美化 Handsome 主题的一些细节。你可以对插件进行非商用的二次开发。</p>'.
        '<p>有任何问题请联系发邮件至<strong><a href="mailto:wu1jin2cheng3@live.cn"> wu1jin2cheng3@live.cn </a></strong>'.
        '<p>更多信息请参阅 <b><a href="https://github.com/Alomerry/SkyMo">详细说明</a></b> '.
        '<p><b><a href="https://github.com/Alomerry/SkyMo/releases/tag/1.1.0">最新版地址</a></b> '.
        '<hr />';
        echo $html;

        //赞赏心跳特效
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('赞赏心跳特效'), NULL));
        $heatBeat = new Typecho_Widget_Helper_Form_Element_Radio('heatBeat',array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ),'open', '',"<img src='http://alomerry.com/usr/uploads/2020/01/673845452.gif' style='width: 7rem;'>");
        $form->addInput($heatBeat);
        
        //星星轨迹特效
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('星星轨迹特效'), NULL));
        $starTrack = new Typecho_Widget_Helper_Form_Element_Radio('starTrack',array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ),'open', '',"<img src='http://alomerry.com/usr/uploads/2020/01/286602434.gif' style='width: 30rem;'>");
        $form->addInput($starTrack);

        // $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('炫光鼠标特效'), NULL));
        // $clickThemes = new Typecho_Widget_Helper_Form_Element_Radio('clickThemes',array(
        //     'open' => _t('开启'),
        //     'close' => _t('关闭'),
        // ),'open','',"");
        // $form->addInput($clickThemes);

        //复制添加版权信
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('复制添加版权信息'), NULL));
        $copyright = new Typecho_Widget_Helper_Form_Element_Radio('copyright',array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ),'open','',"");
        $form->addInput($copyright);

        //页脚
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('页脚'), NULL));
        $footStyle = new Typecho_Widget_Helper_Form_Element_Radio('footStyle',array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ),'open','',"<img src='http://alomerry.com/usr/uploads/2020/01/2908048897.png' style='width: 30rem;'>");
        $form->addInput($footStyle);
        $footCSS = new Typecho_Widget_Helper_Form_Element_Select("footCSS",array(
            "github-badge.css" => "github-badge.css",
            "style.css" => "style.css"
        ),"github-badge.css","样式选择","<strong style='color: #00b8ff9e'> 要切换自定义样式，请替换插件目录下 <code>/css/foot</code> 的 <code>style.css</code> 文件 </strong>");
        $form->addInput($footCSS);

        //代码样式
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('代码样式'), NULL));
        $codeStyle = new Typecho_Widget_Helper_Form_Element_Radio('codeStyle',array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ),'open','',"<img src='https://alomerry.com/usr/uploads/2020/01/2908048897.png' style='width: 30rem;'>");
        $form->addInput($codeStyle);
        $codeCSS = new Typecho_Widget_Helper_Form_Element_Select("codeCSS",array(
            "github-badge.css" => "github-badge.css",
            "style.css" => "style.css"
        ),"github-badge.css","样式选择","<strong style='color: #00b8ff9e'> 要切换自定义样式，请替换插件目录下 <code>/css/foot</code> 的 <code>style.css</code> 文件 </strong>");
        $form->addInput($codeCSS);
        
        //背景彩带特效
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('背景彩带特效'), NULL));
        $backgroundRibbon = new Typecho_Widget_Helper_Form_Element_Radio('backgroundRibbon', array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ), 'open',_t('修改 ribbon.js 可以调整彩带参数、位置和样式。'),
        "<img src='http://alomerry.com/usr/uploads/2020/01/499543144.gif' style='width: 30rem;'>");
        $form->addInput($backgroundRibbon);

        //首页头像 hover 旋转
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('首页头像 hover 旋转'), NULL));
        $headSpin = new Typecho_Widget_Helper_Form_Element_Radio('headSpin', array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ), 'open',_t(''),
        "<img src='http://alomerry.com/usr/uploads/2020/01/3441578448.gif' style='width: 30rem;'>");
        $form->addInput($headSpin);

        //评论打字机特效
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('评论打字机特效'), NULL));
        $typeWriter = new Typecho_Widget_Helper_Form_Element_Radio('typeWriter', array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ), 'open','',"");
        $form->addInput($typeWriter);
        
        //失去焦点页面替换标签名
        $form->addInput(new ExTitle_Plugin('btnTitle', NULL, NULL, _t('失去焦点页面替换标签名'), NULL));
        $visibilityTextShow = new Typecho_Widget_Helper_Form_Element_Radio('visibilityTextShow', array(
            'open' => _t('开启'),
            'close' => _t('关闭'),
        ), 'close', '',"");
        $form->addInput($visibilityTextShow);
        $visibilityText = new Typecho_Widget_Helper_Form_Element_Text('visibilityText', null, _t('See you soon!'),'', "<strong style='color: red'>如果开启替换标签标题, 请填写文字</strong>");
        $form->addInput($visibilityText);
    }
    
    /**
     * 个人用户的配置面板
     * 
     * @access public
     * @param Typecho_Widget_Helper_Form $form
     * @return void
     */
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    
    /**
     * 修改页面底部信息
     * 
     * @access public
     * @return void
     */
    public static function footer()
    {
        echo "<script>console.log('%c SkyMo v1.1 %c by Alomerry | https://www.alomerry.com ','color:#fff; background: linear-gradient(to right , #7A88FF, #d27aff); padding:5px; border-radius: 10px;','color:#fff; background: linear-gradient(to right , #7A88FF, #d27aff); padding:5px; border-radius: 10px;');</script>"; 
        
        $SkyMo = Helper::options()->plugin('SkyMo');
        $path = self::STATIC_DIR;

        
        //输出js文件
        $src = $path . '/js/script.js';
        echo "<script src='$src'></script>";

        //页脚
        if($SkyMo->footStyle == 'open'){
            echo "<link rel='stylesheet' type='text/css' href='" . $path . "/css/foot/foot-require.css' />";
            echo "<link rel='stylesheet' type='text/css' href='" . $path . "/css/foot/" .$SkyMo->footCSS."' />";
            echo "<script src='" . $path . "/js/footer.js'></script>";
        }

        //代码样式
        if($SkyMo->codeStyle == 'open'){
            echo "<link rel='stylesheet' type='text/css' href='" . $path . "/css/code/code.css' />";
            // echo "<link rel='stylesheet' type='text/css' href='" . $path . "/css/code/" .$SkyMo->codeCSS."' />";
        }

        //星星鼠标轨迹
        if($SkyMo->starTrack == 'open'){
            $tmp = $path . '/js/mouse/star/canvas.js';
            echo "<script src='$tmp'></script>";
        }

        //鼠标点击特效
        // if($SkyMo->clickThemes == 'open'){
            $tmp = $path . '/js/mouse/click.js';
            echo "<script src='$tmp'></script>";
        // }
        
        //背景彩带特效
        if($SkyMo->backgroundRibbon == 'open'){
            $tmp = $path . '/js/background/ribbon.js';
            echo "<script src='$tmp'></script>";
        }

        //版权相关
        if($SkyMo->copyright == 'open'){
            $tmp= $path . '/js/copyright.js';
            echo "<script src='$tmp'></script>";
        }
        
        //文本框打字机特效
        if($SkyMo->typeWriter == 'open'){
            $tmp = $path . '/js/commentTyping.js';
            echo "<script src='$tmp'></script>";
        }
        

    }

    /**
     * 修改页面顶部信息
     * 
     * @access public
     * @return void
     */
    public static function header()
    {
        
        $SkyMo = Helper::options()->plugin('SkyMo');
        $path = self::STATIC_DIR;

        echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/font.css" />';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/style.css" />';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/card.css" />';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/head-title.css" />';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/comment.css" />';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/toc.css" />';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/tag.css" />';

        if($SkyMo->headSpin == "open"){
            echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/head-spin.css" />';
        }

        if($SkyMo->heatBeat == "open"){
            echo '<link rel="stylesheet" type="text/css" href="' . $path . '/css/heat-beat.css" />';
        }

        if($SkyMo->visibilityTextShow == "open"){
            $visibilityText = $SkyMo->visibilityText;
            $js .= '<script>';
            $js .= <<<JS
jQuery(document).ready(function() {
    document.addEventListener('visibilitychange', function () {
    if (document.visibilityState == 'hidden') {
        normal_title = document.title;
        document.title = "{$visibilityText}";
    } else {
        document.title = normal_title;
    }
});});
JS;
            $js .= '</script>';
            echo $js;
        }

    }

    /**
     * 新建 MySQL 表
     * 
     * @access public
     * @return void
     */
    public static function installDB(){

    }
}
class ExTitle_Plugin extends Typecho_Widget_Helper_Form_Element
{

    public function label($value)
    {
        /** 创建标题元素 */
        if (empty($this->label)) {
            $this->label = new Typecho_Widget_Helper_Layout('label', array('class' => 'typecho-label', 'style'=>'font-size: 2em;font-family: cursive;border-bottom: 1px #ddd solid;padding-top:0.5em;'));
            $this->container($this->label);
        }

        $this->label->html($value);
        return $this;
    }

    public function input($name = NULL, array $options = NULL)
    {
        $input = new Typecho_Widget_Helper_Layout('p', array());
        $this->container($input);
        $this->inputs[] = $input;
        return $input;
    }

    protected function _value($value) {}
}