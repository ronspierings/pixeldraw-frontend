class PixelData
{
    constructor(color) {
        this._color = color;
    }

    get color()
    {
        return this._color
    }

    set color(color)
    {
        this._color = color;
    }
}

// 
export default PixelData