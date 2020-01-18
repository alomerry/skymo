之前暑假乘着优惠买了腾讯云的服务器就一直想写个博客。可惜本人后端想做个漂亮优雅的博客实在太难了。花了一段时间陆陆续续写了一个还看到过去的乞丐版（），后来考研中间耽搁一段时间，重新回来看自己写的js，css，头大。因为想赶紧刷PAT所以就用typecho搭建了博客，买了一个好康的主题，下面事主题修改教程，被我整合成一个插件，下载地址

# 背景
## 背景图片
fdssad
## 背景流动彩带

我不是作者网上down的，侵删
在`plugin.php`中引用`ribbon.js`
可以在js中修改参数

此处修改彩带位置
```
// screen helper
    var screenInfo = function (e) {


        var width = Math.max(0, _w.innerWidth || _d.clientWidth || _b.clientWidth || 0),
            height = Math.max(0, _w.innerHeight || _d.clientHeight || _b.clientHeight || 0),
            scrollx = Math.max(0, _w.pageXOffset || _d.scrollLeft || _b.scrollLeft || 0) - (_d.clientLeft || 0),
            scrolly = Math.max(0, _w.pageYOffset || _d.scrollTop || _b.scrollTop || 0) - (_d.clientTop || 0);
        return {
            width: width,
            height: height,
            ratio: width / height,
            centerx: width / 2,
            centery: height / 2,
            scrollx: scrollx,
            // scrolly: scrolly
            scrolly: 0
        };

    };
```

此处修改参数
```
this._canvas = null;
        this._context = null;
        this._sto = null;
        this._width = 0;
        this._height = 0;
        this._scroll = 0;
        this._ribbons = [];
        this._options = {
            // ribbon color HSL saturation amount
            colorSaturation: "80%",
            // ribbon color HSL brightness amount
            colorBrightness: "60%",
            // ribbon color opacity amount
            colorAlpha: 1,
            // how fast to cycle through colors in the HSL color space
            colorCycleSpeed: 8,
            // where to start from on the Y axis on each side (top|min, middle|center, bottom|max, random)
            verticalPosition: "center",
            // how fast to get to the other side of the screen
            horizontalSpeed: 200,
            // how many ribbons to keep on screen at any given time
            ribbonCount: 3,
            // add stroke along with ribbon fill colors
            strokeSize: 0,
            // move ribbons vertically by a factor on page scroll
            parallaxAmount: -0.5,
            // add animation effect to each ribbon section over time
            animateSections: true
        };
```



```
 this._canvas = document.createElement("canvas");
                this._canvas.style["display"] = "block";
                this._canvas.style["position"] = "fixed";
                this._canvas.style["margin"] = "0 0 0 0";
                this._canvas.style["padding"] = "0 0 0 0";
                this._canvas.style["border"] = "0";
                this._canvas.style["outline"] = "0";
                this._canvas.style["left"] = "0";
                this._canvas.style["top"] = "0";
                this._canvas.style["width"] = "100%";
                this._canvas.style["height"] = "100%";
                this._canvas.style["z-index"] = "-1";
                this._canvas.style["background-color"] = "rgba(31, 31, 31, 0)";
                this._canvas.id = "bgCanvas";
```

# 页脚
使用Github徽章样式美化
在plugin.php中引用github-badge.css
```
$options = Helper::options();
$path = $options->pluginUrl . '/SkyMo/';
echo '<link rel="stylesheet" type="text/css" href="' . $path . 'css/github-badge.css" />';
```

# 赞赏按钮跳动
在`style.css`文件中添加以下代码

```
/* 跳动特效 */
@keyframes drop {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.2);
    }
    to {
        transform: scale(1);
    }
}

/* 定位并应用特效 */
div.support-author>button.btn-pay {
    animation: drop 1s infinite;
}
```

# 鼠标痕迹

## 星星轨迹

在plugin.php中引入canvas.js
同时在script.js中添加
$("body").prepend("<canvas id='stage1' class='stage' style='position: fixed;'></canvas>");

## 社会主义核心价值观/爱心浮动
在plugin.php中引入heart.js或者scv.js


# 博客信息
```
/* 博客信息颜色 */

#blog_info>ul>li:nth-child(1)>span.badge{
    background-color: #0043ff;
}
#blog_info>ul>li:nth-child(2)>span.badge{
    background-color: #cc00ff;
}
#blog_info>ul>li:nth-child(3)>span.badge{
    background-color: #ffb100;
}
#blog_info>ul>li:nth-child(4)>span.badge{
    background-color: #ff0076;
}
```

# 彩色标签
```
/* Tag颜色 */
.tags a:nth-child(1)
{
    background:#3399ffc9;
}
.tags a:nth-child(2)
{
    background:#ff3300b8;
}
.tags a:nth-child(3)
{
    background:#f90;
}
```

# 去除头像阴影

```
/* 去除头像阴影 */
div.dropdown.wrapper span img.normal-shadow{
    box-shadow:unset !important ;
}
```

# 首页头像hover转动
```
/*首页头像自动旋转*/
.thumb-lg{
    width:130px;
}

.avatar{
    -webkit-transition: 0.4s;
    -webkit-transition: -webkit-transform 0.4s ease-out;
    transition: transform 0.4s ease-out;
    -moz-transition: -moz-transform 0.4s ease-out; 
}

.avatar:hover{
    transform: rotateZ(360deg);
    -webkit-transform: rotateZ(360deg);
    -moz-transform: rotateZ(360deg);
}

#aside-user span.avatar{
    animation-timing-function:cubic-bezier(0,0,.07,1)!important;
    border:0 solid
}

#aside-user span.avatar:hover{
    transform:rotate(360deg) scale(1.2);
    border-width:5px;
    animation:avatar .5s
}
```

# 首页文章图片获取焦点放大

```
.item-thumb{
    cursor: pointer;  
    transition: all 0.6s;  
}

.item-thumb:hover{
      transform: scale(1.05);  
}

.item-thumb-small{
    cursor: pointer;  
    transition: all 0.6s;
}

.item-thumb-small:hover{
    transform: scale(1.05);
}
```

