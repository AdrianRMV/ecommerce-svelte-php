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
        <Route path="/">
            <Login />
        </Route>
        <Route path="/home" component={Home} />
        <Route path="/logout" component={Logout} />
        <Route path="/profile" component={Profile} />
        <Route path="/registerUser" component={RegisterUser} />
        <Route path="/profileSettings" component={ProfileSettings} />

        <Route path="/users" component={Users} />
        <Route path="/catalogos" component={Catalogos} />

        <Route path="/users/:id" let:params>
            <UsersView id={params.id} />
        </Route>

        <Route path="/users/settings/:id" let:params>
            <UserSettings id={params.id} />
        </Route>

        <Route path="/clientes" component={Clientes} />


        <Route path="/cupones/:id" let:params>
            <ViewCupones id={params.id} />
        </Route>

        <Route path="/cupones" component={Cupones} />
        
        <Route path="/products" component={Products} />

        <Route path="/client_info/:id" let:params>
            <ViewCliente id={params.id} />
        </Route>

        <Route path="/viewProduct/:id" let:params>
            <ViewProduct id={params.id} />
        </Route>

        <Route path="/viewPresentacion" component={ViewPresentacion} />

        <Route path="/ordenes" component={Ordenes} />
        
        <Route path="/viewOrder/:id" let:params>
            <ViewOrder id={params.id}/>
        </Route>

        <Route path="/viewDireccion" component={ViewDireccion} />



        <!-- 404 -->
        <Route path="/*" component={NotFound} />
    </div>
</Router>
