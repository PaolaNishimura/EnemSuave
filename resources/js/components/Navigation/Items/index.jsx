import React from 'react';

import Item from '../Item';

import classes from './Items.css';

const items = () => (
    <ul className={classes.Items}>
        <Item link="/" active>Home</Item>
        <Item link="/">Entrar</Item>
        <Item link="/">Registrar</Item>
    </ul>
);

export default items;