function bey(no,type,bey)
{
    let lang=['e','j','c'];
    const cell=(lang,text='',colspan='',borderless=false)=>{
        colspan= colspan>=1? 'colspan':'';
        border= borderless? '':'border-R';
        if (lang=='s') return `<td class='symbol ${border}'>${text}</td>`;
        if (lang=='e') return `<td class='padding-L' ${colspan}><a class='eng'>${text}</a></td>`;
        if (lang=='j') return `<td class='jap-td' ${colspan}><a class='jap'>${text}</a></td>`;
        if (lang=='c') return `<td class='${border} ten-char' ${colspan}><a class='chi'>${text}</a></td>`;
        if (lang=='c5') return `<td class='five-char' ${colspan}><a class='chi'>${text}</a></td>`;
        if (lang=='c5R') return `<td class='${border} five-char' ${colspan}><a class='chi'>${text}</a></td>`;
    };
    
    class part 
    {
        constructor(sym=null) {
            this.sym=sym; }
        blank() {
            return "<td><del>ꕕ</del></td>"+cell('e')+cell('j')+cell('c5R'); }
    }
    class layer extends part 
    {
        constructor(sym,upperFusion) {
            super(sym);
            this.upperFusion=upperFusion;
        }
        blank(divided=true) {
            return divided? super.blank():"<td><del>ꕕ</del></td>"+cell('e','',1)+cell('j','',1)+cell('c5R','',5);
        }
        baseORring(p) {
            if (this.system=='GT')
                return cell('s',`<del>00</del>${p}`)+names.layer5b[p].map((name,i)=>cell(lang[i],name));
            if (this.system=='SP')
                return cell('s',`<del>0</del>${p}`)+names.layer7r[p].map((name,i)=>cell(lang[i],name));
        }
        chip(c) {
            if (this.system=='GT')
                return cell('s',c=='Δ'? 'D&nbsp;':c.length==1? c+'&nbsp;':c)+names.layer5c[c].map((name,i)=>cell(lang[i],name,'',i==2 && c=='Δ'));
            if (this.system=='SP')
                return cell('s',c.length==1? '&nbsp;'+c:c)+names.layer7c[c].map((name,i)=>cell(lang[i],name));
        }
        weightORchassis(p) {
            if (this.system=='GT')
                return '<td class="symbol border-R">'+(p=='!'? '🚫':p=='/'? '':p)+'</td>';
            if (this.system=='SP')
                return `<td class="symbol`+(this.upperFusion? ``:` border-R`)+`">${p}</td>`;
        }
        static layer(l) {
            let colspan=[1,1,5];
            return cell('s', l=='Sr'? `<del>s</del>${l}`:l.replace(/^([A-ZαβΩ][^αγ]?)$/,'&nbsp;$1'))+
                names.layers[l].map((name,i)=>cell(lang[i], 
                    i==2 && name.replace(/\s/g,'').length>=11? `<small>${name}</small>`:name, colspan[i], i==2 && l=='nL'));
        }
        code() { 
            let [,body,chip,key]=this.sym.split(/^(.)\.([A-zⱯΔ/]+)\.?(.*)?$/);
            if (!body)
                return this.sym=='/'? this.blank(false):layer.layer(this.sym);         
            this.system=key.match(/\d[A-Z]/)? 'SP':'GT';
            return (body=='/'? this.blank():this.baseORring(body))+(chip=='/'? this.blank():this.chip(chip))+this.weightORchassis(key);
        }
    }
    class disk extends part
    {
        constructor(sym) {
            super(sym); 
        }
        blank(frame=false) {
            return frame? "<td class='symbol'>&nbsp;&nbsp;_</td>"+cell('e')+cell('j')+cell('c5R'):super.blank();
        }
        static core(c,d) {
            return cell('s',/^[\d_]′?$/.test(c)? d.replace('′','<i>′</i>').replace(/^(0.)$/,'<del>-</del>$1'):d);
        }
        static frame(c,f) {
            let lang=['e','j','c5R'];
            return (f=='_'? ['','','']:names.frames[f]).map((name,i)=>cell(lang[i], (i==2? `<span>${c} </span>`:`${c} `)+name));
        }
        static disk(d) {
            let lang=['e','j','c5R'];
            return cell('s',d.replace(/^([^\d]+)$/,'$1&nbsp;'))+names.disks[d].map((name,i)=>cell(lang[i],name));
        }
        code() {
            let [,core,frame]=this.sym.split(/^([\d′_α]+)([A-Zα_])/);
            if (core)
                return disk.core(core,this.sym)+disk.frame(core,frame);
            else 
                return this.sym=='_'? this.blank(true):this.sym=='/'? this.blank():disk.disk(this.sym);
        }
    }
    class driver extends part 
    {
        constructor(sym,lowerFusion) {
            super(sym); 
            this.lowerFusion=lowerFusion;
        }
        static get handlers() {
            return [
                (eng,dash)=>(eng.length>10? eng.replace(/\s/,'<br>'):eng)+(dash && eng? '′':''),
                (jap,dash)=>jap.replace(/(アルティメット|エクステンド)(?=.+)/,'$1<br>')+(dash && jap? '′':''),
                (chi,dash)=>{
                    if (chi.length>5) chi=`<small>${chi}</small>`;
                    return dash && chi? chi.replace(/｜/,'′｜')+'′':chi;
                }
            ];
        }
        static driver(d,dash=false) {
            let lang=['e','j','c5'];
            return names.drivers[d].map((name,i)=>cell(lang[i],driver.handlers[i](name,dash)));
        }
        symbol(s,dash=false) {
            return cell('s',(this.lowerFusion? '&nbsp;':'')+s.replace(/\+/,'<sup>+</sup>')+(s=='∞'? '&nbsp;':'')+
                (dash? `<i${this.lowerFusion? ' style="position:absolute"':''}>′</i>`:''));
        }
        code() {
            let [,sym,dash]=this.sym.split(/^(.*?)(′)?$/);
            return this.sym=='/'? this.blank():this.symbol(sym,dash)+driver.driver(sym,dash);
        }
    }
    const image= no=>{
        if (/^BG\-0[123]/.test(no))
            return no;
        if (/^BA\-01/.test(no))
            return 'https://img.biggo.com.tw/sESou3p27oTebKM_ciIqJnPH8zIa0NfDW4Jvpmbf1OAc/https://cfshopeetw-a.akamaihd.net/file/c2b2f62535578ca3b604d1d5d95d57b1';
        if (/^BA\-02/.test(no))
            return 'https://ct.yimg.com/xd/api/res/1.2/vYdfavcriXmhODfeHxKeug--/YXBwaWQ9eXR3YXVjdGlvbnNlcnZpY2U7aD02MDA7cT04NTtyb3RhdGU9YXV0bzt3PTYwMA--/https://s.yimg.com/ob/image/c4d8642f-cae6-473f-b763-bb50f7186288.jpg';
        if (/^BA\-03/.test(no))
            return 'https://www.toysrus.com.hk/www/4001/files/13274a.jpg';
        if (/^BA\-04/.test(no))
            return 'https://scontent.fhkg4-1.fna.fbcdn.net/v/t1.0-9/65720862_2332208193713820_6740800357590368256_n.jpg?_nc_cat=108&_nc_eui2=AeHT2qHZSlCcN7amtRw3FFLQ-w6t43rZx5nKkX9SODXr_QLjMI4ZgIB-WtI2DWRrSXD-T7OotyOccV3IXcgdrU8jmM1YXZO9aNDYJigsUKp-UA&_nc_oc=AQnH0o2cJyDS0yi1YQeAL59UJvyAORp6Ag4eQNY0dEHZjZiQesoiIYOphEJnaKUIqvY&_nc_ht=scontent.fhkg4-1.fna&oh=42f8579607c24c3764460a014301000b&oe=5DBCD8A3';
        if (/^限定.06/.test(no))
            return 'BBG-06';
        if (no=='限定.07')
            return 'BB-00';
        if (no=='限定.18')
            return 'B_00_emperorF';
        if (no=='限定.19'||no=='限定.22'||no=='限定.27')
            return no.replace('限定.','BBG');
        if (no=='限定.32')
            return no.replace('限定.','BBG-');
        if (no=='限定.30'||no=='限定.34')
            return no.replace('限定.','bbg');
        if (/^限定/.test(no))
            return no.replace('限定.','BBG_');
        const number=no.substring(2,5);
        if (number>=129 && number<=132 || number>=139 && number<=154 || number>=159)
            return no;
        return no.replace('-','_');
    };
    let img=image(no);
    if (img.indexOf('https')<0)
        img='https://beyblade.takaratomy.co.jp/category/img/products/'+img.split('.')[0]+'.png';
    
    let number=no.split('.')[0].replace(/^B-(\d{2})$/,'B-<del>0</del>$1').replace('限定','wbba');
    
    this.regex=bey;
    let parts=bey.split(' ');
    
    let lowerFusion=false;
    if (parts[1] && !parts[2]) {
        lowerFusion=true;
        [this.layer,this.disk,this.driver]=[new layer(parts[0]),new disk('/'),new driver(parts[1],true)];
    }
    else if (parts[1]=='/' && parts[2]!='/') //upper fusion
        [this.layer,this.disk,this.driver]=[new layer(parts[0],true),new disk(parts[0]=='nL'? '_':'/'),new driver(parts[2])];
    else
        [this.layer,this.disk,this.driver]=[new layer(parts[0]),new disk(parts[1]),new driver(parts[2])];

    this.beyrow=function() {
        rowCode=`<tr class='${type}'>`+cell('s',`<a onclick=pic('${img}')>${number}`)+this.layer.code();
        rowCode+=(lowerFusion? this.driver.code()+this.driver.blank():this.disk.code()+this.driver.code())+'</tr>';
        $("table").append(rowCode);
        
        if (['100','117','129'].includes((n=no.match(/[\d\.]+/))? n[0]:0))
            $('tr:last-of-type td:first-child a').css('color','black');
        if (['139','140.1','142','144','145.1','145.2','146.1','148','149.1','149.2','150','151.1','153.1','153.2','154','155','156.1','157'].includes((n=no.match(/[\d\.]+/))? n[0]:0))
            $('tr:last-of-type td:first-child a').css('color','goldenrod');
        if (number=='B-130' && this.layer.sym=='eF') 
            $('tr:last-of-type td:nth-of-type(3) a,tr:last-of-type td:nth-of-type(4) a,tr:last-of-type td:nth-of-type(5) a').append('<img src="chips.svg#LC">');
        if (number.indexOf('98')>0 && (this.layer.sym=='dF' || this.layer.sym=='tW'))
            $('tr:last-of-type td:nth-of-type(3) a,tr:last-of-type td:nth-of-type(4) a,tr:last-of-type td:nth-of-type(5) a').append('<img src="chips.svg#MGC">');
        if (this.driver.sym=='Ev' || this.driver.sym=='Om')
            $('tr:last-of-type td:nth-last-of-type(2)').css('letter-spacing','-0.05em');
        return;
    };
}