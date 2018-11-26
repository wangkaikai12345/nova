Nova.booting((Vue, router) => {
    router.addRoutes([
        {
            name: 'tips',
            path: '/tips',
            component: require('./components/Tool'),
        },
    ])
})
