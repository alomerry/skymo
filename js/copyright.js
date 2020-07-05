/* ***

* 
* By: Alomerry
* Last Update: 2020.7.5

*** */
document.body.addEventListener('copy', function (e) {
    if (window.getSelection().toString() && window.getSelection().toString().length > 42) {
        setClipboardText(e);
        swal({
            title: '复制成功! 转载请注明出处',
            timer: 700,
            button:false
          })
        // alert('商业转载请联系作者获得授权，非商业转载请注明出处哦~\n谢谢合作~(｡・`ω´･)');
    }
});
function setClipboardText(event) {
    var clipboardData = event.clipboardData || window.clipboardData;
    if (clipboardData) {
        event.preventDefault();
        var author = "就当一次路过丶"//"<?php $this->author() ?>";
        var url = "http://alomerry.com";//"<?php $this->options->siteUrl(); ?>";
        var htmlData = ''
            + window.getSelection().toString()
            + '著作权归作者所有。<br>'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。<br>'
            + '作者：' + author + '<br>'
            + '链接：' + window.location.href + '<br>';

        var textData = ''
            + window.getSelection().toString()
            + '著作权归作者所有。\n'
            + '商业转载请联系作者获得授权，非商业转载请注明出处。\n'
            + '作者：' + author + '\n'
            + '链接：' + window.location.href + '\n';
        clipboardData.setData('text/html', htmlData);
        clipboardData.setData('text/plain', textData);
    }
}

