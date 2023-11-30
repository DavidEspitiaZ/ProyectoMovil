import React, {useEffect} from 'react';
import { View, Text, Image, StyleSheet, TouchableOpacity } from 'react-native';

const HomeScreen = ({ navigation }) => {
    useEffect(() => {
        const redirectTimeout = setTimeout(() => {
            navigation.navigate('ProductList');
        }, 3000);

        return () => {
            clearTimeout(redirectTimeout); // Limpiar el temporizador si el componente se desmonta antes de que se complete el tiempo de espera
        };
    }, [navigation]);
    
    return (
    <View style={styles.container}>
        <View style={styles.logoContainer}>
            <Image
        source={require('../assets/images/Store_logo.jpg')}
        style={styles.logo}
            />
        </View>
        <Text style={styles.heading}>Bienvenidos a la Tienda Naturista</Text>
        <Text style={styles.description}>
        Descubre una amplia variedad de productos naturales para tu bienestar y salud.
        </Text>
    </View>
    );
};

const styles = StyleSheet.create({
    container: {
    flex: 1,
    justifyContent: 'center',
    alignItems: 'center',
    backgroundColor: '#F5EFE0',
    },
    logoContainer: {
        width: 150,
        height: 150,
        borderRadius: 75, 
        overflow: "hidden", 
        marginBottom: 20,
        },
        logo: {
        flex: 1, 
        width: null, 
        height: null, 
        resizeMode: "cover", 
        },
    heading: {
    fontSize: 24,
    fontWeight: 'bold',
    marginBottom: 10,
    marginTop: 20,
    color: '#388E3C',
    },
    description: {
    fontSize: 16,
    textAlign: 'center',
    paddingHorizontal: 20,
    marginBottom: 20,
    color: '#4E342E',
    },
    LoginButton: {
        width: 200,
        height: 40,
        backgroundColor: "#2ECC71", // Color del botón de inicio de sesión
        justifyContent: "center",
        alignItems: "center",
        borderRadius: 5,
        marginBottom: 20
        },
    SignupButton: {
    width: 200,
    height: 40,
    backgroundColor: "#3498DB", // Color del botón de registro
    justifyContent: "center",
    alignItems: "center",
    borderRadius: 5,
    marginBottom:20
    },
    buttonText: {
        color: "#FFFFFF", // Color del texto de los botones
        fontWeight: "bold",
        },
});

export default HomeScreen;
