import React, { Component } from 'react';
import SliderItem from './SliderItem';
import PreviewButton from './PreviewButton';
import NextButton from './NextButton';


export default class SliderBlock extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            sliderItems: [
                {
                    image: 'https://picsum.photos/190/150/?random',
                    title: 'title1',
                    'content': 'content 1'
                },{
                    image: 'https://picsum.photos/190/150/?random',
                    title: 'title2',
                    'content': 'content 2'
                },{
                    image: 'https://picsum.photos/190/150/?random',
                    title: 'title3',
                    'content': 'content 3'
                },{
                    image: 'https://picsum.photos/190/150/?random',
                    title: 'title4',
                    'content': 'content 4'
                },{
                    image: 'https://picsum.photos/190/150/?random',
                    title: 'title5',
                    'content': 'content 5'
                },{
                    image: 'https://picsum.photos/190/150/?random',
                    title: 'title6',
                    'content': 'content 6'
                }
            ]
        };
    };

    prevHandleClick(e){
        e.preventDefault();

        const { sliderItems } = this.state;

        var tmpFirstElement = sliderItems[0];

        sliderItems.shift();

        sliderItems.push(tmpFirstElement);

        this.setState({sliderItems: sliderItems});
    }

    nextHandleClick(e){
        e.preventDefault();

        const { sliderItems } = this.state;

        var itemLength = sliderItems.length;

        var tmpLastElement = sliderItems[itemLength-1];

        sliderItems.pop();

        this.setState({sliderItems: [tmpLastElement].concat(sliderItems)})
    }


    render() {
        let style = {
            sliderBlock: {
                margin: 10+"px",
                padding: 5+"px",
                height: 275+"px",
                width: "auto",
                overflow: "hidden",
                position: "relative"
            },
            sliderInnerBlock: {
                height: 275+"px",
                width: "92%",
                overflow: "hidden",
                position: "absolute",
                top: 0,
                left: "35px"
            },
        };

        return (
            <div className="sliderBlock" style={style.sliderBlock}>
                <PreviewButton clickEvent={this.prevHandleClick.bind(this)}/>
                    <div className="sliderInnerBlock" style={style.sliderInnerBlock}>
                        {this.state.sliderItems.map((item,key) => {
                            return <SliderItem slider={item} key={key}/>;
                        })}
                    </div>
                <NextButton clickEvent={this.nextHandleClick.bind(this)}/>
            </div>
        );
    }
}

