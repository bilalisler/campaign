import React, { Component } from 'react';
import SliderBlock from './SliderBlock';

class App extends React.Component {
    constructor(props) {
        super(props);

        this.state = {
            data: ''
        };
    };
    render() {
        return (
            <div>
                <SliderBlock/>
            </div>
        );
    }
}

export default App;
