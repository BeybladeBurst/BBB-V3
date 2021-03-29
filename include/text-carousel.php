<style>
input,article
{display:none;}
input:checked+article
{display:flex;}
main>label,article
{width:100%;}
main>label
{
    display:inline-block;
    text-align:left;
    margin:0.3em auto;
    height:4em;line-height:4em;
}
main>label a:first-of-type
{
    float:left;
    font-size:1.75em;
}
main>label i
{
    float:right;margin-right:0.5em;
    font-size:2em;font-family:'Font Awesome 5 Free';
}
label:hover
{
    cursor:pointer;
    filter:brightness(90%);
}
article
{
    justify-content:center;
    flex-wrap:wrap;
    margin:0.3em 0;
}
section
{
    width:100%;max-width:540px;
    display:inline-block;
    margin:0 0.5em;
}
ol
{
    list-style:none;
    position:relative;
    padding:0;margin:0;
    width:100%;padding-bottom:calc(100%/1.618);
    border:0.15em solid;border-radius:0.7em;
    overflow:hidden;
}
ol li
{
    width:100%;height:100%;
    position:absolute;left:calc(100%*var(--left));
    transform:translateX(calc(-100%*var(--checked)));
    margin:auto;padding:0.1em;
    transition:1s;
}
ol li:first-of-type
{
    display:flex;justify-content:center;align-items:center;
    text-align:center;
}
ol li:first-of-type img
{max-width:50%;}
ol li:not(:first-of-type) p
{font-size:0.75em;}
ol li:not(:first-of-type) img
{
    max-width:50%;max-height:11em;
    float:right;margin-left:0.3em;
}
ol li p
{
    margin:1em;
    transform:scale(0.5);opacity:0;
    transition:0.5s;
    line-height:1.5em;
}
ol li.checked p
{transform:scale(1);opacity:1;}
    
article menu
{
    display:flex;justify-content:space-between;
    width:95%;
    padding:0;margin:0.7em auto;
}
article menu::before,article menu::after
{content:'';}
.previous label::before
{content: '\f053';}
.checked+li label::before
{content: '\f054';}
article menu label::before
{content:attr(data-page);}
section input:first-of-type:checked~menu::before,menu .previous,menu .checked,menu .checked+li,section input:last-of-type:checked~menu::after
{
    display: flex;
    font-family: 'Font Awesome 5 Free';
    font-weight: 700;
}
article menu label,article menu::before,article menu::after
{
    display:flex;justify-content:center;align-items:center;
    margin:0;
    width:3.5em;
    border-radius:0.25em;
    font-size:2em;
}
article menu li,article menu::before,article menu::after
{display:none;}
article menu li.checked label
{
    border:0.05em solid;border-radius:50%;
    width:1.5em; height:1.5em; cursor:initial;
}
</style>
<template id='article'>
    <label></label>
    <input type='checkbox'>
    <article>
        <template id="section">
            <section>
                <input type="radio">
                <ol>
                    <li><p></p></li>
                </ol>
                <menu>
                    <li><label></label></li>
                </menu>
            </section>
        </template>
    </article>
</template>
<script>
function buildTC(contents,titles)
{
    contents.forEach((section,h)=>{
        h++;
        let article=document.importNode(document.querySelector('#article').content,true);
        section.forEach((pages,i)=>{
            i++;
            let section=document.importNode(article.querySelector('#section').content,true);
            pages.forEach((content,j)=>{
                j++;
                if (j===1)
                    return section.querySelector('ol li p').innerHTML=content;
                let radio=section.querySelector('input').cloneNode(true);
                section.querySelector('ol').insertAdjacentElement('beforebegin',radio);
                let p=section.querySelector('ol li').cloneNode(true);
                p.setAttribute('style','--left:'+j);
                p.querySelector('p').innerHTML=content;
                section.querySelector('ol').appendChild(p);
                let label=section.querySelector('menu li').cloneNode(true);
                section.querySelector('menu').appendChild(label);
            });
            section.querySelectorAll('input[type=radio]').forEach((radio,j)=>{
                j++;
                radio.setAttribute('name',`a${h}s${i}`);
                radio.setAttribute('id',`a${h}s${i}p${j}`);
            });
            section.querySelectorAll('menu label').forEach((label,j)=>{
                label.setAttribute('data-page',j);
                j++;
                label.setAttribute('for',`a${h}s${i}p${j}`);
            });
            section.querySelector('input[type=radio]:first-of-type').checked=true;
            section.querySelector('ol li:first-of-type').setAttribute('style','--left:1');
            section.querySelector('ol li:first-of-type').setAttribute('class','checked');
            section.querySelector('menu li:first-of-type').setAttribute('class','checked');
            section.querySelector('section').setAttribute('style','--checked:1;');
            article.querySelector('article').appendChild(section);
        });
        article.querySelector('input[type=checkbox]').setAttribute('id',`a${h}`);
        article.querySelector('label').setAttribute('for',`a${h}`);
        article.querySelector('label').innerHTML=titles[h-1];
        document.querySelector("main").appendChild(article);
    });
    document.querySelectorAll('template').forEach(t=>t.remove());
    paginate();
}
function paginate()
{
    document.querySelectorAll('input[type=radio]').forEach(radio=>
        radio.addEventListener('change',x=>{
            let index=radio.id.match(/\d+$/)[0];
            let section=radio.parentNode;
            section.setAttribute('style','--checked:'+index);
            section.querySelectorAll('li').forEach(f=>f.removeAttribute('class'));
            section.querySelectorAll(`li:nth-of-type(${index})`).forEach(f=>{
                f.setAttribute('class','checked'); try {
                f.previousElementSibling.setAttribute('class','previous'); } catch(e) {}
            });
        })
    );
}
</script>