import { StyleSheet, Text, View, TextInput, Button, Alert, TouchableOpacity, Image} from 'react-native';
import React, { useEffect, useState } from 'react';
import axios from 'axios';
import { useNavigation } from '@react-navigation/native';
import AsyncStorage from '@react-native-async-storage/async-storage';

const Login = () => {
    const [email, setEmail] = useState('');
    const [password, setPassword] = useState('');
    const navigation = useNavigation(); 
    const handleLogin = () => {
        axios.post('http://127.0.0.1:8000/api/login', {
            email: email,
            password: password,
        })
            .then((response) => {
                // console.log(token)
                Alert.alert('Bienvenido', 'Inicio de sesión correcto.');
                const token = response.data.token;
                AsyncStorage.setItem('token', token);
                    navigation.navigate('Home');
                setEmail('');
                setPassword('');
            })
            .catch((error) => {
                if (error.response && error.response.status === 401) {
                    alert('Contraseña incorrecta. Inténtalo de nuevo.');
                    navigation.navigate('Login');
                } else {
                    Alert.alert('Error', 'Error al iniciar sesión. Inténtalo de nuevo.');
                    navigation.navigate('Login');
                }
            });
};

    return (
    <View style={styles.container}>
        <View style={styles.logoContainer}>
            <Image
        source={require("../../assets/images/Store_logo.jpg")} 
        style={styles.logo}
            />
        </View>
        <Text style={styles.title}>Iniciar Sesión</Text>
        <TextInput
            style={styles.input}
            placeholder="Correo Electrónico"
            onChangeText={(text) => setEmail(text)}
            value={email}
        />
        <TextInput
            style={styles.input}
            placeholder="Contraseña"
            onChangeText={(text) => setPassword(text)}
            secureTextEntry={true}
            value={password}
        />
        <TouchableOpacity style={styles.loginButton} onPress={handleLogin}>
        <Text style={styles.buttonText}>Iniciar Sesión</Text>
        </TouchableOpacity>
        <Text style={styles.title}>¿No tienes una cuenta?</Text>
        <TouchableOpacity style={styles.signupButton} onPress={() => navigation.navigate('SignUp')}>
        <Text style={styles.buttonText}>Registrarse</Text>
        </TouchableOpacity>
    </View>
    );
};


const styles = StyleSheet.create({
    container: {
    flex: 1,
    justifyContent: "center",
    alignItems: "center",
    backgroundColor: "#F5EFD7", // Color de fondo de la tienda
    },
    logoContainer: {
        width: 150,
        height: 150,
        borderRadius: 75, // crea un círculo al establecer la mitad del ancho como radio
        overflow: "hidden", // Recorta el contenido para que se ajuste al círculo
        marginBottom: 20,
        },
        logo: {
        flex: 1, // Asegura que la imagen ocupe todo el espacio dentro del contenedor circular
        width: null, // Anula el ancho predeterminado para que se ajuste al contenedor
        height: null, // Anula la altura predeterminada para que se ajuste al contenedor
        resizeMode: "cover", // Escala la imagen para que se ajuste al contenedor circular
        },
    title: {
    fontSize: 24,
    fontWeight: "bold",
    marginBottom: 20,
    },
    input: {
    width: 300,
    height: 40,
    backgroundColor: "#FFFFFF", // Color de fondo del campo de entrada
    borderRadius: 5,
    marginBottom: 10,
    paddingLeft: 10,
    },
    loginButton: {
    width: 300,
    height: 40,
    backgroundColor: "#2ECC71", // Color del botón de inicio de sesión
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 5,
    marginBottom: 10,
    },
    signupButton: {
    width: 300,
    height: 40,
    backgroundColor: "#3498DB", // Color del botón de registro
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 5,
    },
    buttonText: {
    color: "#FFFFFF", // Color del texto de los botones
    fontWeight: "bold",
    },
});

export default Login;
