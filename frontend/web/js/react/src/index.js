import React from 'react';
import { render } from 'react-dom';
import './index.css';
import App from './App';

window.renderApp = function(component, id) {
    render(
        <App component={component} />,
        document.getElementById(id)
    );
};

