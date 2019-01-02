import React, { Component } from 'react';

export default class PreviewButton extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            data: ''
        };
    };
    render() {
        let style = {
            PreviewButton: {
                height: "290px",
                width: "30px",
                position: "absolute",
                left: 0,
                top: 0
          }
        };

        return (
            <div className="previewButton" style={style.PreviewButton}>
                <a href="" onClick={this.props.clickEvent}> Prev </a>
            </div>
        );
    }
}

