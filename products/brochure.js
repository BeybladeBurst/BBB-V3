function brochure(id)
{
    id=parseInt(id);
    switch(id)
    {
        case 128:
        case 126:
            return [id+'_2_72.jpg',id+'_1_72.jpg'];
        case 98:
            return [id+'_72_2.jpg',id+'_72_1.jpg'];
        case 156:
        case 153:
        case 151:
        case 149:
        case 146:
        case 140:
        case 121:
            return [id+'_2.jpg',id+'_1.jpg'];
        case 130:
        case 129:
        case 127:
        case 125:
        case 122:
        case 97:
            return [id+'_72.jpg'];
        case 65:
            return ['59_0.jpg'];
        case 64:
        case 63:
            return [id+'_0.jpg'];
        default:
            return [id.toString().padStart(2,'0')+'.jpg'];
    }
}