import React from 'react'

import  '../../css/star.css'

class StarWidget extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            localRating: props.rating
        }
        this.reset = this.reset.bind(this);
        this.setRating = this.setRating.bind(this);
    }

    setRating(i,type){
        this.setState({localRating:i+1});
    }

    reset() {
        this.setState({localRating: this.props.rating});
    }

    render() {
        const {totalStars, rating, updateRating} = this.props;
        const totalStarsNum = (totalStars | 5);
        const classes = 'star-item icon icon-star';
        let stars = _.fill(_.times(totalStarsNum, (i)=> 0), 1, 0, this.state.localRating).map((value, index)=> {
            return <span
                key={index}
                className={(value === 1) ? `full ${classes}`: `${classes}`}
                onClick={updateRating.bind(null, index+1)}
                onMouseOver={this.setRating.bind(this, index, 'hover')}
                onMouseOut={this.reset}>
                </span>;
        });
        return (<div className='star-widget' ref={(w)=> this.stars = w}     >
                <ReactCSSTransitionGroup name="test">{stars}</ReactCSSTransitionGroup></div>
        );
    }
}

class RatingApp extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            rating:0
        }
    }

    updateRating(rating) {
        this.setState({rating});
    }

    render() {
        return (<div id="app">
            <StarWidget
                rating={this.state.rating}
                updateRating={this.updateRating.bind(this)}
            />
        </div>);
    }
}

export default RatingApp
