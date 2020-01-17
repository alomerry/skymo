<?php
/**
 * Handsome主题美化插件
 * 
 * @package Sky.Mo 
 * @author morizunzhu
 * @version 1.0.0
 * @link http://typecho.org
 */
class SkyMo_Plugin implements Typecho_Plugin_Interface
{
    /**
     * 激活插件方法,如果激活失败,直接抛出异常
     * 
     * @access public
     * @return void
     * @throws Typecho_Plugin_Exception
     */
    public static function activate()
    {
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
        if (isset($_GET['action']) && $_GET['action'] == 'buildSearchIndex') {
            self::buildSearchIndex();
        }

        /* $click_themes = new Typecho_Widget_Helper_Form_Element_Radio(
            'click_themes',
            array(
                '1' => _t('开启'),
                '2' => _t('关闭'),
            ),
            '1',
            _t('是否启用炫光鼠标特效'),
            _t('')
        );
        $form->addInput($click_themes); */
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
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function footer()
    {
        //  获取用户配置
        $options = Helper::options();
        $path = $options->pluginUrl . '/SkyMo/';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . 'css/github-badge.css" />';
        //  输出js文件
        $src = $options->pluginUrl . '/SkyMo/js/script.js';
        echo "<script src='$src'></script>";
        
        //鼠标点击特效
        $click = $options->pluginUrl . '/SkyMo/js/mouse/click.js';
        echo "<script src='$click'></script>";

        //背景彩带特效
        $bgband = $options->pluginUrl . '/SkyMo/js/background/ribbon.js';
        echo "<script src='$bgband'></script>";

        //星星鼠标轨迹
        $mouseStar = $options->pluginUrl . '/SkyMo/js/mouse/star/canvas.js';
        echo "<script src='$mouseStar'></script>";
    }

    /**
     * 插件实现方法
     * 
     * @access public
     * @return void
     */
    public static function header()
    {
         //  获取用户配置
        $options = Helper::options();
        $path = $options->pluginUrl . '/SkyMo/';
        echo '<link rel="stylesheet" type="text/css" href="' . $path . 'css/style.css" />';
    }
}
