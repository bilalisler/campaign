import React from 'react'

// React Components
import ReactDOM from 'react-dom'
// import { Router } from 'react-router-dom'

// Custom Components
import App from './components/App'
import Rating from './components/Rating'

// <Router>
// <App />
// </Router>
ReactDOM.render(<App/>, document.getElementById('root'));
ReactDOM.render(<Rating rating={2}/>, document.getElementById('selectRating'));
