<?php

class Classify
{
    static function type($part,$sym) {
        switch ($part) {
            case 'layer7r': $lists=[
                'A'=>['S','B'],
                'D'=>[],
                'S'=>['G'],
                'B'=>['K'],];
                break;
            case 'layer5b': $lists=[
                'A'=>['A','S','Z','K','I'],
                'D'=>['R','B','D','P','N'],
                'S'=>['G','C','W','F','H'],
                'B'=>['J','E','V','L','U','T','M'],];
                break;
            case 'layer': $lists=[
                'A'=>['Pα','DGS','DGF','DGV','GDV','GD','LL','SP',
                    '闇α','光α','bX','vL','bL','wV','超V','rα','kD','bK','nL','tN','gV','SgV','sX','dαr',
                    'D','M','O','V','X','α','B2','D2','F2','L2','M2','O2','V2','X2'],
                'D'=>['Bγ','Rγ','DCS','DCF','DCV','DCS','RL',
                    'pP','dP','oE','rP','eF','hK','lα','aB','bJ','gK','kS','tW','dαp',
                    'E','K','U','W','A2','E2','K2','Q2','U2','W2','β'],
                'S'=>['BP','WB','FS',
                    'aK','aH','cR','gF','dC','dF','mG','bR','sT','gZ','Ω','sΩ',
                    'C','H','R','T','Y','H2','J2','P2','R2','Y2','Z2'],
                'B'=>['DRS','DRF','DRV','DZS','DZF','DZV','EA',
                    '超A','超S','dH','hS','zA','lαe','rαe',
                    'N','S','G2','I2','N2','S2','aC','sR','lS','Sr','dαe'],];
                break;
            case 'disk': $lists=[
                'A'=>['B','F','M','N','Q','T','W','Z','α','1','1′','6','9','12','13','α′','Bl','St','Dr'],
                'D'=>['A','C','D','H','J','L','V','Y','β','2','10','Hr','Pr'],
                'S'=>['G','I','P','R','U','Ω','4','5','8','8′','Rt','Ar','Wh'],
                'B'=>['K','O','S','00','0','3','7','11','Vn','Cn'],];
                break;
            case 'frame': $lists=[
                'A'=>['V','H','R','L','α'],
                'D'=>['B'],
                'S'=>['F','P','E'],
                'B'=>['T','D','W'],];
                break;
            case 'driver': $lists=[
                'A'=>['A','B','H','I','J','Q','V','X','α','Ch','Ds','Ev','Hn','Ir','Ig','Jl','Pw','Qc','Rb','Sp','Sw','Ul','Vl','Xc','αn'],
                'D'=>['D','M','N','O','P','β','At','Gr','Lp','Yr','Fr','Qs','Kp','Om','Hy','Ym'],
                'S'=>['C','E','G','R','S','W','Y','Ω','Ab','Br','Cy','Et','Fl','Nt','Pl','Wd','Rs','Lw'],
                'B'=>['F','L','T','U','Z','Mr','Op','Tw','Zt','Xt','Xt+','Dm','Tr','Bl','Gn','Zn'],]; 
                break;
            default:
                $lists=[];
        };
        foreach ($lists as $type=>$list)
            if (in_array($sym,$list))
                return part::TYPES[$type];
        return $part=='layer7ʃ'? part::TYPES[substr($sym,-1,1)]:'unknown';
    }
    
    static function spin($part,$sym) {
        if (strpos($part,'layer')===FALSE || $part=='layer5w')
            return;
            
        $default='R';
        switch ($part) {
            case ('layer7ʃ'): $lists=[
                'R'=>['1A'],]; 
                $default='D';
                break;
            case ('layer7r'): $lists=[
                'L'=>['K'],];
                break;
            case ('layer7c'): $lists=[
                'L'=>['Hl','Ff','Ln'],
                'D'=>['Sp'],];
                break;
            case ('layer5b'): $lists=[
                'L'=>['D','E','N','T','W','Z'],
                'D'=>['L','M'],];
                break;
            case ('layer5c'): $lists=[
                'L'=>['B','F','L'],
                'D'=>['Δ','Db','S'],];
                break;
            case ('layer'): $lists=[
                'L'=>['gF','bL','hS','lα','lαe','aB','dF','nL','L2','DGS','DGF','DGV','LL'],
                'D'=>['超S','lS','Sr'],];
                break;
            default: 
                $lists=[];
        };
        foreach ($lists as $spin=>$list)
            if (in_array($sym,$list))
                return part::SPINS[$spin];
        return part::SPINS[$default];
    }
    
    static function deck($part,$sym) {
        if ($part=='layer7ʃ')
            return in_array($sym,['1A','1B','2A'])? 'fusion ':false;
        if ($part=='layer')
            return $sym=='nL'? 'fusion ':false;
        if ($part=='driver')
            return in_array($sym,['Gn','Hy','Ig','∞','∞L'])? 'fusion ':false;
    }
    
    static function dash($part,$sym) {
        global $dash;
        if ($part=='driver')
            return in_array($sym,$dash)? 'dash':false;
    }
};