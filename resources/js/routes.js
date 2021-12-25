import Home from "./components/Home";
import About from "./components/About";
import Authors from "./components/Authors";
import Author from "./components/Author";

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            component: Home
        },
        {
            path: '/about',
            component: About
        },
        {
            path: '/authors',
            component: Authors
        },
        {
            path: '/authors/:id',
            component: Author
        },
    ]
}