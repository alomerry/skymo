/* ***

* 
* By: Alomerry
* Last Update: 2020.7.5

*** */
$(document).ready(function () {
    //页脚版权信息
    var copyrightInfo =
        '<div class="github-badge">\n' +
        '    <a href="http://www.typecho.org" target="_blank" title="由Typecho强力驱动">\n' +
        '        <span class="badge-subject">Powered</span>\n' +
        '        <span class="badge-value bg-blue">Typecho</span>\n' +
        '    </a>\n' +
        '</div>' +
        '&nbsp;|&nbsp;\n' +
        '<div class="github-badge">\n' +
        '    <a href="https://www.ihewro.com/archives/489/" target="_blank" title="站点使用Handsome主题，作者：友人C">\n' +
        '        <span class="badge-subject">Theme</span>' +
        '        <span class="badge-value bg-orange">Handsome</span>\n' +
        '    </a>\n' +
        '</div>' +
        '&nbsp;|&nbsp;\n' +
        '<div class="github-badge">\n' +
        '    <a href="http://alomerry.com" target="_blank" title="Handsome由人间有味是清欢丶修改">\n' +
        '        <span class="badge-subject">Modified</span>' +
        '        <span class="badge-value bg-red">Alomerry</span>\n' +
        '    </a>\n' +
        '</div>';
    //备案号信息
    var recodeInfo =
        '<div class="github-badge">\n' +
        '    <a href="" target="_blank" title="">\n' +
        '        <span class="badge-subject">Copyright</span>' +
        '        <span class="badge-value bg-blue">©2019-2020</span>\n' +
        '    </a>\n' +
        '</div>' +
        '&nbsp;|&nbsp;\n' +
        '<div class="github-badge">\n' +
        '    <a href="http://www.beian.miit.gov.cn" target="_blank" title="">\n' +
        '        <span class="badge-subject">VPS</span>' +
        '        <span class="badge-value bg-brightgreen">HongKong</span>\n' +
        '    </a>\n' +
        '</div>';
        
    $('#footer span.pull-right').html(copyrightInfo);
    $('#footer span.text-ellipsis').last().html(recodeInfo);

})