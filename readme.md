# SkyMo V1.2.1

> 插件最新更新时间：2021/02/24

## 后续更新计划

- [ ] 页脚自定义
- [x] 添加 娃娃字体
- [ ] 添加 社会主义核心价值观 click 动效。
- [ ] 添加 爱心浮动 click 动效。
- [ ] 修正 访客颜色。
- [ ] 修正 Github 页面颜色。
- [ ] 配置 可调字体大小。

## 主要特色

- 自定义字体以及生效位置（V1.2）。
- 添加背景流动彩带。
- 美化页脚样式，并提供自定义样式。
- 添加赞赏按钮跳动。
- 添加鼠标痕迹：
  - 星星轨迹
  - 爱心浮动（待添加）
  - 社会主义核心价值观（待添加）
- 博客信息美化。
- 彩色标签。
- 首页头像 hover 转动。
- 首页文章图片获取焦点放大。
- 页面失去焦点后可以设置动态标签名。

## 说明

- 本插件带有一些额外样式优化，可能会和已有的插件样式冲突，如果有请在 GitHub 提交 issue。

## 安装步骤

- 下载本插件，解压到 `usr/plugins/` 目录中。
- 进入网站后台-控制台-插件-激活插件。
- 启用或关闭部分动效。
- [`Github下载地址`][1]

## 更新

### 1.2.2（2020.10.04）[tag type="success"]latest[/tag]

添加 Wawa 字体。

### 1.2.0（2020.10.04）

添加字体选择和字体生效位置。

### 1.1.0（2020.07.06）

将插件设计成可配置启动/关闭。

### 1.0.0（2020.01.17）

- 添加动效
- 添加背景

## 效果展示和修改

### 字体

- ZCOOL XiaoWei

![ZCOOL XiaoWei][17]

- Manaco

![Manaco][18]

---

### 插件设置

![plugAdmin1.png][3]
![plugAdmin2.png][2]

### 背景图片

荒野大镖客2背景
![荒野大镖客2背景.png][4]
荷塘背景
![荷塘背景.png][5]

[点击下载背景图片址][6]

### 背景流动彩带

![1.gif][7]

修改彩带位置
```js
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
修改彩带参数
```js
this._canvas = null;
this._context = null;
this._sto = null;
this._width = 0;
this._height = 0;
this._scroll = 0;
this._ribbons = [];
this._options = {
    colorSaturation: "80%", // ribbon color HSL saturation amount
    colorBrightness: "60%", // ribbon color HSL brightness amount
    colorAlpha: 1, // ribbon color opacity amount
    colorCycleSpeed: 8, // how fast to cycle through colors in the HSL color space
    verticalPosition: "center", // where to start from on the Y axis on each side (top|min, middle|center, bottom|max, random)
    horizontalSpeed: 200, // how fast to get to the other side of the screen
    ribbonCount: 3, // how many ribbons to keep on screen at any given time
    strokeSize: 0, // add stroke along with ribbon fill colors
    parallaxAmount: -0.5, // move ribbons vertically by a factor on page scroll
    animateSections: true // add animation effect to each ribbon section over time
};
```
设置彩带CSS
```js
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

---

### 页脚

![启用样式.png][8]

![自定义样式.png][9]

---

### 赞赏按钮跳动

![跳动.gif][10]

---

### 鼠标痕迹

#### 星星轨迹

![星星轨迹.gif][11]

---

### 博客信息

![博客信息.png][12]

---

### 彩色标签

![彩色标签.png][13]

---

### 首页头像hover转动

![首页头像hover.gif][14]

>注意，该动效默认启用，插件设置中未提供开关。

---

### 首页文章图片获取焦点放大

![获取焦点放大.gif][15]

---

### 引入bilibili视频响应式样式

参考[typecho文章内挂载B站视频][16]

[1]: https://github.com/Alomerry/SkyMo
[2]: http://alomerry.com/usr/uploads/2020/07/1620333604.png
[3]: http://alomerry.com/usr/uploads/2020/07/2366965718.png
[4]: http://alomerry.com/usr/uploads/2020/01/1523369272.png
[5]: http://alomerry.com/usr/uploads/2020/01/629167857.png
[6]: http://alomerry.com/archives/195/
[7]: http://alomerry.com/usr/uploads/2020/01/499543144.gif
[8]: http://alomerry.com/usr/uploads/2020/01/2908048897.png
[9]: http://alomerry.com/usr/uploads/2020/07/1625104036.png
[10]: http://alomerry.com/usr/uploads/2020/01/673845452.gif
[11]: http://alomerry.com/usr/uploads/2020/01/286602434.gif
[12]: http://alomerry.com/usr/uploads/2020/01/1357181980.png
[13]: http://alomerry.com/usr/uploads/2020/01/3349164392.png
[14]: http://alomerry.com/usr/uploads/2020/01/3441578448.gif
[15]: http://alomerry.com/usr/uploads/2020/01/2240396392.gif
[16]: https://www.icnfox.cn/archives/42.html
[17]: http://alomerry.com/usr/uploads/2020/10/2495026317.png
[18]: http://alomerry.com/usr/uploads/2020/10/2799388962.png