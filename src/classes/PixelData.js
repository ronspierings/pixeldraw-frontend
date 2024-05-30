class PixelData
{


    constructor(color) {
        this._color = "#" + this.randomColor();
    }


    /*
        Properties of this class
    */


    // color propertie
    color()
    {
        return this._color
    }
    set color(color)
    {
        this._color = color;
    }

    // pos_x propertie
    pos_x()
    {
        return this._pos_x;
    }
    set pos_x(pos_x)
    {
        this._pos_x = pos_x;
    }

    // pos_y propertie
    pos_y()
    {
        return this._pos_y;
    }
    set pos_y(pos_y)
    {
        this._pos_y = pos_y;
    }


    /*
        Other/Helper Methods
    */

    randomColor()
    {
        return Math.floor( Math.random() * 16777215 ).toString(16);
    }
}


// 
export default PixelData