document.addEventListener('visibilitychange', function () {
    if (document.visibilityState == 'hidden') {
        normal_title = document.title;
        document.title = '(つェ⊂)我藏好了哦';
    } else {
        document.title = normal_title;
    }
});