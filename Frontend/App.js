// App.js
import React from "react";
import { NavigationContainer } from "@react-navigation/native";
import { createStackNavigator } from "@react-navigation/stack";
import { View, Text, Button } from "react-native";
import HomeScreen from "./screens/HomeScreen";
import Login from "./screens/Security/Login";
import SignUp from "./screens/Security/SignUp";
import ShoppingCart from "./screens/ShoppingCart";
import Navigation from "./Navigation";
import ProductList from "./screens/ProductList";


const Stack = createStackNavigator();

const App = () => {
  return (
    // <NavigationContainer>
    //   <Stack.Navigator initialRouteName="Home">
    //     <Stack.Screen name="Home" component={HomeScreen} />
    //     <Stack.Screen name="Login" component={Login} />
    //     <Stack.Screen name="SignUp" component={SignUp} />
    //     <Stack.Screen name="ShoppingCart" component={ShoppingCart} />
    //   </Stack.Navigator>
    // </NavigationContainer
    <Navigation/> 
    // <ProductList/>
    // <ShoppingCart/>

  );
}

export default App;
