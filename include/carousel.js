function Carousel(img)
{
    const count=img.length;
    
    const inputs=()=>[...Array(count).keys()].map(i=>`<input type="radio" name="pages" id="p${i+1}">`).join('');
    
    const carousel=()=>`
        <section style="--amount:${count}">
            <ol>`+[...Array(count).keys()].map(i=>`<li style="--index:${i+1}"><a><img></a></li>`).join('')+`</ol>
            <menu>`+labels()+`</menu>
        </section>`;
    
    const labels=()=>['sparking','GT','Z','god','dual','single'].map((s,i)=>`
        <li><label for="p${i+1}" class="Prize"><img src="/img/system-${s}.png"></label></li>`).join('');
    
    this.target=i=>
    {
        Q('ol').setAttribute('style','--checked:'+i);
        Q(`ol li:nth-of-type(${i}) img`).src=img[i-1];
        Q(`ol li:nth-of-type(${i}) a`).href=img[i-1];
        Q('li[is]', li=>li.removeAttribute('is'));
        Q(`li:nth-of-type(${i})`, li=>li.setAttribute('is','checked-img'));
    };
    this.build=()=>
    {
        Q('main').insertAdjacentHTML('beforeend',carousel());
        Q('nav menu').insertAdjacentHTML('beforeend',labels());
        Q('body').insertAdjacentHTML('afterbegin',inputs());
        Q('input[name=pages]', (input,i)=>input.addEventListener('change',()=>this.target(i+1)));
        Q('input:first-of-type').click();
    };
}