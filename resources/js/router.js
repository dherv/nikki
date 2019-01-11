import Vue from "vue";

import VueRouter from "vue-router";

Vue.use(VueRouter);

import DailyList from "./components/DailyList";
import Editor from "./components/Editor/Editor";
import WordPage from "./components/WordPage";
import GrammarPage from "./components/GrammarPage";
import Login from "./components/Login";
import Edit from "./components/Edit";

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/login",
            name: "login",
            component: Login,
            props: {}
        },
        {
            path: "/",
            name: "home",
            component: Editor,
            props: {}
        },
        {
            path: "/dailys",
            name: "dailys",
            component: DailyList
        },
        {
            path: "/editor",
            name: "editor",
            component: Editor
        },
        {
            path: "/words",
            name: "words",
            component: WordPage
        },
        {
            path: "/grammars",
            name: "grammar",
            component: GrammarPage
        },
        { path: "/daily/:id", name: "edit", component: Edit }
    ]
});

export default router;
