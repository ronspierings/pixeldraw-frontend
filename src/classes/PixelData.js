class PixelData
{
    constructor(color) {
        this._color = "#" + this.randomColor();
    }

    color()
    {
        return this._color
    }

    set color(color)
    {
        this._color = color;
    }

    randomColor()
    {
        return Math.floor( Math.random() * 16777215 ).toString(16);
    }
}


// 
export default PixelData