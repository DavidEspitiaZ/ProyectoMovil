import { StyleSheet } from 'react-native'
import { NavigationContainer } from '@react-navigation/native';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { createStackNavigator } from '@react-navigation/stack';
import MaterialCommunityIcons from '@expo/vector-icons/MaterialCommunityIcons';
import React, { useEffect, useState} from 'react';
import Entypo from '@expo/vector-icons/Entypo';
import AsyncStorage from '@react-native-async-storage/async-storage';


// Importamos los componentes que vamos a usar para las pestañas

import Login from './screens/Security/Login';
import SignUp from './screens/Security/SignUp';
import Logout from './screens/Security/Logout';
import HomeScreen from './screens/HomeScreen';
import ProductList from './screens/ProductList';
import ShoppingCart from './screens/ShoppingCart';


// Creamos el componente que va a contener las pestañas
const Tab = createBottomTabNavigator();
const Stack = createStackNavigator();

// Creamos el componente que va a contener la navegación principal
export default function Navigation() {
    // Aquí se usa la lógica para determinar si el usuario ha iniciado sesión
    // const[userLoggedIn, setUserLoggedIn] = useState(false);
    
    // useEffect(() => {
    //     const checkIfLoggedIn = async () => {
    //         const token = await AsyncStorage.getItem('token');
    //         setUserLoggedIn(!!token); // Devuelve true si hay un token, false de lo contrario
    //     };
    //     checkIfLoggedIn();
    // }, []);
    
    return (
        <NavigationContainer>
            <Stack.Navigator initialRouteName='Login'>
            <Stack.Screen name="Home" component={HomeScreen} options={{ headerShown: false }} />
            <Stack.Screen name="Login" component={Login} options={{ headerShown: false }} />
            <Stack.Screen name="SignUp" component={SignUp} options={{ headerShown: false }} />
            <Stack.Screen name="Logout" component={Logout} options={{ headerShown: false }} />
            <Stack.Screen name="ShoppingCart" component={ShoppingCart} options={{ headerShown: true }} />
            <Stack.Screen name="ProductList" component={ProductList} options={{ headerShown: false }} />
            </Stack.Navigator>
        </NavigationContainer>
    );
    }

    {/* {userLoggedIn ? ( */}
            {/* ) : ( */}
            {/* <Tab.Navigator
                initialRouteName="Login"
                tabBarOptions={{
                activeTintColor: '#e91e63',
                }}
            >
            <Tab.Screen name="Login" component={Login}
                options={{
                tabBarLabel: 'Iniciar sesión',
                tabBarIcon: ({ color, size }) => (
                <MaterialCommunityIcons name="login" color={color} size={size} />
                ),
                }}
            />
            <Tab.Screen name="SignUp" component={SignUp} style={styles.nuevoUsuario}
                options={{
                tabBarLabel: 'Crear nuevo usuario',
                tabBarIcon: ({ color, size }) => (
                <MaterialCommunityIcons name="account-plus" color={color} size={size} />
                ),
                }}
            />
            <Tab.Screen name="About" component={About}
                options={{
                tabBarLabel: 'Sobre nosotros',
                tabBarIcon: ({ color, size }) => (
                <MaterialCommunityIcons name="information" color={color} size={size} />
                ),
                }}
            />
            </Tab.Navigator> */}
        {/* )} */}
        
const styles = StyleSheet.create({
    nuevoUsuario: {
        flex: 1,
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#fff',
        padding: 10,
        margin: 10,
        borderRadius: 10,
    },
});

