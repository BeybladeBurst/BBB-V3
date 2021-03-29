if (window.location.href.indexOf('beyblade.takaratomy.co.jp/info_detail?myPost=9999')>=0) {

document.querySelector('section .container').remove();

const place = document.getElementsByTagName('section')[0];

const cat = ['Random Layers 〔Layer 抽包／扭蛋〕', 'Random Booster recolours 〔陀螺抽包異色〕', 'Set recolours 〔組合包異色〕', 'Tournament prizes 〔大會比賽景品〕', 'Beyblade Burst Gentei 〔BBG 商品〕', 'Other limited merchandises 〔其他限定商品〕', 'Corocoro lottery prizes 〔コロコロ抽選品〕', 'Other lottery prizes 〔其他抽選品〕', 'Original 〔原色品〕'];
const val = ['rl', 'rb', 'rec', 'tour', 'bbg', 'limited', 'CRprize', 'prize', 'ori'];
place.insertAdjacentHTML('beforebegin', '<input type=text value='+window.location.href.slice(-4)+'><button>Go</button>\
<select name=category><option value>--- Category ---</option></select><hr>');
let select = document.querySelector('select[name="category"]');
cat.forEach((c, i) => {
    let option = document.createElement('option');
    option.setAttribute('value', val[i]);
    option.innerText = c;
    select.appendChild(option);
});
select.addEventListener('change', event => {
    place.innerHTML = '<span>Loading</span>';
    fetch("https://beybladevcrv.com/update/part-id.php?part=" + event.target.value).then(json => json.json()).then(ids => {
        place.innerHTML = '';
        ids.forEach(i => show(i));
    });
});

document.querySelector('.content input[type="text"]+button').addEventListener('click', event => each(event));
document.querySelector('.content input[type="text"]').addEventListener('keydown', event => event.keyCode==13? each(event):undefined);
function each(event) {
    place.innerHTML = '';
    let start = event.target.previousSibling.value;
    for (let i = start; i > start - 100; i--)
        show(i, true);
}
function show(id, flush = false) {
    const url = '/category/img/garage/00';
    if (id === 0)
        return place.insertAdjacentHTML('beforeend', '<br>');
    let img = document.createElement('img');
    let ap = (flush === true) ? Math.random() : '';
    img.setAttribute('src', url + ('00' + id).slice(-4) + '.png?' + ap);
    place.appendChild(img);
}
}