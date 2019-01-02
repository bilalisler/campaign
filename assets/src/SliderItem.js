import React, { Component } from 'react';
import PropTypes from 'prop-types';

export default class SliderItem extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            data: ''
        };

    };


    render() {
        let style = {
            // sliderBlock: "height:300px;width:auto;margin: 5px;padding:5px;",
            sliderItem: {
                margin: 5+"px",
                padding: 5+"px",
                // height: 300+"px",
                width: 190 + "px",
                float: "left",
                border: "1px solid #ddd"
            },
            itemBody: {
                padding: 5 + "px"
            }
        };

        return (
            <div className="sliderItem" style={style.sliderItem}>
                <div className="wrapper">
                    <div className="itemHeader">
                        <img src={this.props.slider.image} width="190" height="150"/>
                    </div>
                    <div className="itemBody" style={style.itemBody}>
                        <h5>{this.props.slider.title}</h5>
                        <p>
                            {this.props.slider.content}
                        </p>
                    </div>
                </div>
            </div>
        );
    }
}