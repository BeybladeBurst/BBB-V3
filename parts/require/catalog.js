function catalog(part,flush='')
{
    let {component:comp, symbol:sym, type, spin, dash, deck, names, stat, desc}=part;
    
    let classes=(deck||'')+type+' stat-'+((typeof stat=='object' && stat[5]!==undefined)? 6:5);
      
    if (sym==null)
        return $("section").append(`<a class='box none ${comp}'/>`);    
    if (sym==9)
        classes+=' none';
    if (stat[3].toString().indexOf('克')>0) {
        const grams=parseInt(stat[3].match(/[0-9]+克/)[0]);
        classes+=' grams';
        if (comp=='driver') {
            if (grams>30 && grams<36)
                classes+=' heavy';
            else if (grams>10 && grams<14 || grams>=36)
                classes+=' s-heavy';
            else if (grams>=14)
                classes+=' x-heavy';
        } else if (comp=='layer5b') {
            if (grams>=21 && grams<23)
                classes+=' heavy';
            else if (grams>=23)
                classes+=' s-heavy';
        } else if (comp=='layer5c') {
            if (grams>=14)
                classes+=' s-heavy';
        } else if (comp=='layer5w') {
            if (grams<=5)
                classes+=' light';
        } else if (comp=='layer') {
            if (grams>=36)
                classes+=' heavy';
        }
    }
    else if (stat[3]>=18) 
        classes+=' x-heavy';
    else if (stat[3]>=10 && stat[3]<=17) 
        classes+=' s-heavy';
    else if (stat[3]>=8)
        classes+=' heavy';
    if (sym=='Ul'||sym=='Xt+'||sym=='Om'||sym=='Ym')
        classes+=' long';
      
    let href=(sym.match(/([9∞]|pP|[lrd]αe|AB$)/) || !classes)? '':`href='/products?${comp}=${encodeURIComponent(sym)}#myTable'`;  
        
    return $("section").append(`
    <a ${href} class='${comp} ${classes}' id='${sym}'>
        <div class='info'>${symbolCode()}${nameCode()}</div>
        <div class='content'>${contentCode()}</div>
        <div class='desc'>${desc}</div>
    </a>`);
    
    function symbolCode()
    {
        let code=sym;
        if (sym.match(/^[dlr]α/)) 
            code=sym.substr(0,2); 
        else if (sym.match(/^sΩ/)) 
            code="Ω"; 
        else if (sym.match(/^[DG]../))
            code=sym.substr(0,2)+"<sup>"+sym.substr(2)+"</sup>"; 
        else if (sym.match(/\+$/))
            code=sym.substr(0,2)+"<sup>+</sup>"; 
        else if (sym.match(/\^BA$/))
            code=''; 
        else if (sym.match(/^∞L$/))
            code="∞<sup>L</sup>";
        else if (sym.match(/^Δ$/) && comp=='layer5c')
            code="D";
        return `<div class='symbol-wrap'><h2 class='symbol ${sym.replace('′','').length==1? 'single':''}'>${code}</h2></div>`;
    }
    function nameCode()
    {
        if (!names) return ''; 
        names.eng=names.eng.replace('dash','<sup>dash</sup>');
        if (comp.match(/^layer$/) || classes.indexOf('long')>0) {
            const len=names.jap.length+names.chi.length-15;
            code=`
            <div class='top'>
              <h4 class='can'>`+names.can+`</h4>
              <h3 class='eng'>`+names.eng+`</h3>
            </div>
            <div class='bottom' ${len>0? `style='--space:${len*.045}'`:''}>
              <h3 class='jap'>`+names.jap+`</h3>
              <h3 class='chi'>`+names.chi+`</h3>
            </div>`; 
        } else {
            const len=names.jap.length+names.chi.length+2+names.eng.length/2-(names.eng.match(/[IJfijlt]/g)||[]).length/4-13;
            code=`
            <div class='left' ${len>0? `style='--space:${len}'`:''}>
              <h4 class='can'>`+names.can+`</h4>
              <h3 class='jap'>`+names.jap+`</h3>
            </div>
            <div class='right' ${len>0? `style='--space:${len}'`:''}>
              <h3 class='eng'>`+names.eng+`</h3>
              <h3 class='chi'>`+names.chi+`</h3>
            </div>`; 
        }
        return "<div class='name'>"+code+"</div>";
    }
    function contentCode()
    {
        let term=['攻擊力','防禦力','持久力','重　量','機動力','擊爆力'];
        if (classes.indexOf('grams')>0 && classes.indexOf('stat-5')>0)
            term[3]='重量';
        stat[3]=stat[3].toString().replace('克','<small>克</small>');
                
        return `
        <figure class='img ${spin||''} ${dash||''}'>
            <div class='pic' style='background:url(${comp}/${sym}.png${flush})'></div>
        </figure>
        <dl>${stat.map((s,i)=>`<div><dt>${term[i]}</dt><dd>${s}</dd></div>`).join('')}</dl>`;
    }
}
function slide()
{
    var slider=$("input[type='range']")[0];
    $("main section").css("font-size",slider.value+"em"); 
    slider.oninput=function() {
        $("main section").css("font-size",this.value+"em"); };
}
function magButtons()
{
    let level=3;
    $('nav').before([...Array(level).keys()].map(i=>`<input type='radio' name='mag' id='mag${i+1}'>`).join('')+
        "<input type='checkbox' id='fixed'>");
    $('#mag2').attr('checked','');
    $('nav menu').append(`<li class="mag">`+
        [...Array(level).keys()].map(i=>`<label for='mag${i+1}'></label>`).join('')+
        `<input type="range" min="0.55" max="1.45" value="1" step="0.05"></li>`);
}
function ruler(part)
{
    switch (part)
    {
        case ('layer1'):
        case ('layer2'):
        case ('layer3'):
        case ('layer5b'):
        case ('layer5w'):
        case ('layer7r'):
            max=10;min=0;
            scale=w=>w+7;
            break;
        case ('layer4'):
        case ('disk1'):
        case ('disk2'):
            max=8;min=0;
            scale=w=>w+17;
            break;
        case ('disk3'):
        case ('layer6'):
            max=15;min=5;
            scale=w=>w+17;
            break;
        case ('frame'):
        case ('layer5c'):
        case ('layer7c'):
            max=7;min=0;
            scale=w=>w*0.3+2.3;
            break;
        case ('driver1'):
        case ('driver2'):
        case ('driver3'):
            max=10;min=0;
            scale=w=>w/2+5.4;
            break;
    }
    $('main').after(`
    <input type='checkbox' id='show'>
    <div id='scale' class='${part.replace(/[0-9]+$/,'')}'>
        <label for='show'></label>
        <div class='scale'>`+
            [...Array(max-min+1).keys()].map(i=>i+min).map(w=>`
            <div data-scale=${w}>
                <span>${scale(w).toFixed(1)}</span>
            </div>`).join('')+`
        </div>
    </div>`);
    $('.scale>div:last-of-type span').html('grams');
}
$(document).ready(()=>{
    magButtons();
    if ($(window).width()>701) 
        slide();
    $(window).resize(()=>$(window).width()>701? slide():$("main section").css("font-size",""));
});