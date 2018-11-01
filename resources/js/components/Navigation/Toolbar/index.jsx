import React from 'react';

import Items from '../Items';

import classes from './Toolbar.css';

const toolbar = props => (
    <header className={classes.Toolbar}>
        <div>
            <div>LOGO</div>
            <div>MENU</div>
        </div>
        <nav>
            <Items />
        </nav>
    </header>
);

export default toolbar;