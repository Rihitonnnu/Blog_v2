import React from "react";
import { useEffect } from "react";

function Welcome() {
    useEffect(() => {
        console.log("Welcome Page mounted");
    }, []);

    return (
        <h1>Welcome Inertia.js</h1>
    );
};

export default Welcome;
