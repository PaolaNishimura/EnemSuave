import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter, Route, Switch } from "react-router-dom";

import Layout from './Layout';

class App extends Component {
    render() {
        return (
            <BrowserRouter>
                <Layout>
                    
                </Layout>
            </BrowserRouter>
        );
    }
}

if (document.getElementById('app')) {
    // ReactDOM.render(<App />, document.getElementById('app'));
}
