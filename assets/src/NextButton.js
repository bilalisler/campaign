import React, { Component } from 'react';

export default class NextButton extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            data: ''
        };
    };
    render() {
        let style = {
            NextButton: {
                height: "290px",
                width: "30px",
                position: "absolute",
                top: 0,
                right: 0
            }
        };

        return (
            <div className="NextButton" style={style.NextButton}>
                <a href="" onClick={this.props.clickEvent}> Next </a>
            </div>
        );
    }
}

