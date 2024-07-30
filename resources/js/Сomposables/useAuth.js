const user = {
    id: {
        type: Number
    },
    name: {
        type: String
    },
    email: {
        type: String
    },
}

export default function useAuth() {
    const isAuthenticated = () => {
        return !!localStorage.getItem('token');
    };

    const login = (token, authUser) => {
        localStorage.setItem('token', token);
        user.id = authUser.id;
        user.name = authUser.name;
        user.email = authUser.email;
        localStorage.setItem('user', JSON.stringify(user));
    };

    const authUser = () => {
        const userString = localStorage.getItem('user');
        if (userString) {
            return JSON.parse(userString);
        }
        return null;
    }

    const logout = () => {
        localStorage.removeItem('token');
    };

    const getBearerToken = () => {
        return !!localStorage.getItem('token') ? 'Bearer ' + localStorage.getItem('token') : null;
    };

    const getToken = () => {
        return localStorage.getItem('token');
    };

    return {
        isAuthenticated,
        authUser,
        login,
        logout,
        getBearerToken,
        getToken,
    };
}
