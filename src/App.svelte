<script>
    import { Router, Route } from 'svelte-routing';
    import Login from './views/Login.svelte';
    import Home from './views/Home.svelte';
    import NotFound from './views/NotFound.svelte';
    import Logout from './views/Logout.svelte';
    import Profile from './views/Profile.svelte';
    import ProfileSettings from './views/ProfileSettings.svelte';
    import RegisterUser from './views/RegisterUser.svelte';

    import Users from './views/Users.svelte';
    import UsersView from './views/UserDetails.svelte';
    import UserSettings from './views/UserSettings.svelte';

    import Clientes from './views/Clientes.svelte';
    import Cupones from './views/Cupones.svelte';
    import Products from './views/Products.svelte';
    import Ordenes from './views/Ordenes.svelte';
    // import ViewUser from './views/ViewUser.svelte';
    import ViewCliente from './views/ViewCliente.svelte';
    import Catalogos from './views/Catalogos.svelte';

    import ViewProduct from './views/ViewProduct.svelte';
    import ViewPresentacion from './views/ViewPresentacion.svelte';
    import ViewOrder from './views/ViewOrder.svelte';
    import ViewDireccion from './views/ViewDireccion.svelte';
    import ViewCupones from './views/ViewCupones.svelte';
</script>

<Router>
    <div>
        <!-- Vistas direccionadas con componentes -->
        <Route path="https://poetic-dusk-dbb344.netlify.app/">
            <Login />
        </Route>
        <Route path="https://poetic-dusk-dbb344.netlify.app/home" component={Home} />
        <Route path="https://poetic-dusk-dbb344.netlify.app/logout" component={Logout} />
        <Route path="https://poetic-dusk-dbb344.netlify.app/profile" component={Profile} />
        <Route path="https://poetic-dusk-dbb344.netlify.app/registerUser" component={RegisterUser} />
        <Route path="https://poetic-dusk-dbb344.netlify.app/profileSettings" component={ProfileSettings} />

        <Route path="https://poetic-dusk-dbb344.netlify.app/users" component={Users} />
        <Route path="https://poetic-dusk-dbb344.netlify.app/catalogos" component={Catalogos} />

        <Route path="https://poetic-dusk-dbb344.netlify.app/users/:id" let:params>
            <UsersView id={params.id} />
        </Route>

        <Route path="https://poetic-dusk-dbb344.netlify.app/users/settings/:id" let:params>
            <UserSettings id={params.id} />
        </Route>

        <Route path="https://poetic-dusk-dbb344.netlify.app/clientes" component={Clientes} />


        <Route path="https://poetic-dusk-dbb344.netlify.app/cupones/:id" let:params>
            <ViewCupones id={params.id} />
        </Route>

        <Route path="https://poetic-dusk-dbb344.netlify.app/cupones" component={Cupones} />
        
        <Route path="https://poetic-dusk-dbb344.netlify.app/products" component={Products} />

        <Route path="https://poetic-dusk-dbb344.netlify.app/client_info/:id" let:params>
            <ViewCliente id={params.id} />
        </Route>

        <Route path="https://poetic-dusk-dbb344.netlify.app/viewProduct/:id" let:params>
            <ViewProduct id={params.id} />
        </Route>

        <Route path="https://poetic-dusk-dbb344.netlify.app/viewPresentacion" component={ViewPresentacion} />

        <Route path="https://poetic-dusk-dbb344.netlify.app/ordenes" component={Ordenes} />
        
        <Route path="https://poetic-dusk-dbb344.netlify.app/viewOrder/:id" let:params>
            <ViewOrder id={params.id}/>
        </Route>

        <Route path="https://poetic-dusk-dbb344.netlify.app/viewDireccion" component={ViewDireccion} />



        <!-- 404 -->
        <Route path="https://poetic-dusk-dbb344.netlify.app/*" component={NotFound} />
    </div>
</Router>
