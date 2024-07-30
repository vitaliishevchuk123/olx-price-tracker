import {useRoute, useRouter} from 'vue-router';

export default function useRoutes() {
    const routeObj = useRoute();
    const router = useRouter();

    const currentRouteParams = (key) => {
        return routeObj.params[key];
    };

    const isRoute = (routeName) => {
        return routeObj.name === routeName;
    };

    const currentRouteName = () => {
        return routeObj.name;
    };

    const route = (routeName, parameters = {}) => {
        return router.resolve({
            name: routeName,
            params: parameters,
        }).href;
    };

    const redirectTo = (routeName, params = {}) => {
        if (!isRoute(routeName)) {
            router.push({name: routeName, params: params});
        }
    };

    return {
        isRoute,
        route,
        redirectTo,
        currentRouteParams,
        currentRouteName,
    };
}
