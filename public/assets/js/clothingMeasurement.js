function maleClothes(chest, waist, hips)
{
    //console.log(chest +", " + waist+ ", " + hips);
    if(chest >= 25.5 && chest <= 26 && waist >= 23.5 && waist <= 24 && hips >= 27 && hips <= 28){

        return "YXS";
    }
    else if(chest > 26 && chest <= 27 && waist > 24 && waist <= 25.5 && hips > 28 && hips <= 29.5){
        return "YSM";
    }
    else if(chest > 27 && chest <= 29.5 && waist > 25.5 && waist <= 27 && hips > 29.5 && hips <= 31.5){
        return "YMD";
    }
    else if(chest > 29.5 && chest <= 32 && waist > 27 && waist <= 28.5 && hips > 31.5 && hips <= 33.5){
        return "YLG";
    }
    else if(chest > 32 && chest <= 35 && waist > 28.5 && waist <= 29.5 && hips > 33.5 && hips <= 35){
        return "YXL";
    }
    else if(chest > 35 && chest <= 37.5 && waist > 29.5 && waist <= 32 && hips > 35 && hips <= 37.5){
        return "SM";
    }
    else if(chest > 37.5 && chest <= 41 && waist > 32 && waist <= 34 && hips > 37.5 && hips <= 41){
        return "MD";
    }
    else if(chest > 41 && chest <= 44 && waist > 34 && waist <= 37 && hips > 41 && hips <= 44){
        return "LG";
    }
    else if(chest > 44 && chest <= 48.5 && waist > 37 && waist <= 43 && hips > 44 && hips <= 47){
        return "XL";
    }
    else if(chest > 48.5 && chest <= 53.5 && waist > 43 && waist <= 46.5 && hips > 47 && hips <=50.5){
        return "2XL";
    }
    else if(chest > 53.5 && chest <= 58 && waist > 46.5 && waist <= 51.5 && hips > 50.5 && hips <=53.5){
        return "3XL";
    }
    else{
        return "Size does not exist";
    }
}

function femaleClothes(chest, waist, hips) {
    if(chest >= 25.5 && chest <= 27 && waist >= 23.5 && waist <= 24 && hips >= 27 && hips <= 29){
        return "YXS";
    }
    else if(chest > 27 && chest <= 29 && waist > 24 && waist <= 25 && hips > 29 && hips <= 31){
        return "YSM";
    }
    else if(chest > 29 && chest <= 31 && waist > 25 && waist <= 27 && hips > 31 && hips <= 33){
        return "YMD";
    }
    else if(chest > 31 && chest <= 33.5 && waist > 27 && waist <= 28 && hips > 33 && hips <= 35){
        return "YLG";
    }
    else if(chest > 33.5 && chest <= 36.5 && waist > 28 && waist <= 29.5 && hips > 35 && hips <= 37){
        return "YXL";
    }
    else if(chest >= 29.5 && chest <= 32.5 && waist >= 22.5 && waist <= 26 && hips >= 33 && hips <= 35.5){
        return "XS";
    }
    else if(chest > 32.5 && chest <= 35.5 && waist > 26 && waist <= 29 && hips > 35.5 && hips <= 38.5){
        return "SM";
    }
    else if(chest > 35.5 && chest <= 38 && waist > 29 && waist <= 31.5 && hips >= 38.5 && hips <= 41){
        return "MD";
    }
    else if(chest > 38 && chest <= 41 && waist > 31.5 && waist <= 34.5 && hips > 41 && hips <= 44){
        return "LG";
    }
    else if(chest > 41 && chest <= 44.5 && waist > 34.5 && waist <= 38.5 && hips > 44 && hips <= 47){
        return "XL";
    }
    else if(chest > 44.5 && chest <= 48.5 && waist > 38.5 && waist <= 42 && hips > 47 && hips <= 50){
        return "2XL";
    }


}
