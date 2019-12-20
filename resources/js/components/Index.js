import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import {BrowserRouter, Route, Switch} from 'react-router-dom';

import Home from './home';

function App() {
    //Routes
    return (
        <main>
            <Switch>
                <Route path="/" component={Home} exact />
            </Switch>
        </main>
    );
}

if (document.getElementById('rootView')) {
    ReactDOM.render(<BrowserRouter><App /></BrowserRouter>, document.getElementById('rootView'));
}
