const {JSDOM}=require("jsdom");
const Promise=require("promise");

let beys=[];
let promises=[];
let promisesN=[];

for (let y=2019;y>=2015;y--) 
    promises.push(curling(`https://www.takaratomy.co.jp/products/lineup/series/bb-burst_y${y}.html`).then(html=>parse(html)));
Promise.all(promises).then(()=>{
    beys.sort((a,b)=>parseInt(a.no.match(/\d+/)[0])<parseInt(b.no.match(/\d+/)[0])? -1:1);
    beys.filter(bey=>parseInt(bey.no.match(/\d+/)[0])>=104 || bey.no=='B-00').forEach(bey=>promisesN.push(curling(`https://takaratomymall.jp/shop/g/g4904810${bey.code}/`).then(html=>image(bey,html))) );
    Promise.all(promisesN).then(()=>require("fs").writeFile("beys.txt",JSON.stringify(beys)));
}).catch(error=>console.log(error));

function curling(url) {
    return new Promise((resolve,reject)=>require("curl").get(url,null, (error,resp,html)=> resp.statusCode==200? resolve(html):reject(error) ))
}
function parse(html) {
    const $=(require('jquery'))(new JSDOM(html).window);
    $('.tableType01.mt5>tbody tr:not(:first-child)').each((i,tr)=>{
        no=$(tr).find(".largeIconLink01 a[href*='/detail/bb-burst']").html().match(/B-\d+/);
        code=$(tr).find("a[href*='/g4904810']").attr('href').match(/(?<=4904810)\d+/);
        beys.push({no:no? no[0]:null,code:code? code[0]:null});
    });
}
function image(bey,html) {
    const $=(require('jquery'))(new JSDOM(html).window);
    bey.images=[];
    $('.tt_product4-1__thumb li').each((i,li)=>{
        let match=$(li).find('img').attr('src').match(/(?<=goods\/).\/.*?(?=\.jpg)/);
        bey.images.push(match? match[0]:null);
    });
}