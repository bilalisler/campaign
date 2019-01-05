import React from 'react'

// React Route Components
import {Switch,BrowserRouter as Router, Route} from 'react-router-dom'

// Globals
import routeList from './routeList'

const Routes = () => {
  const routeMap = routeList.map(({path, exact, component}, index) => {
    if(!path) {
      return false
    }

    return (
      <Route key={index} path={path} exact={exact} component={component} />
    )
  });

  return (
    <Router>
        <div>
            {routeMap}
        </div>
    </Router>
  )
};

export default Routes
