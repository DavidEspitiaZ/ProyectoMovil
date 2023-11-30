import React, { useState } from 'react';
import { StyleSheet, Text, View, TextInput, TouchableOpacity, Alert, ScrollView } from 'react-native';
import axios from 'axios';

export default function SignUp({navigation}) {
    const [formData, setFormData] = useState({
        name: '',
        lastName: '',
        email: '',
        password: '',
        confirmarContraseña: '',
        address: '',
    });

    const handleCreateUser = async () => {
    // Construye el objeto de datos del usuario en el formato requerido por Laravel
        const userData = {
            name: formData.name,
            lastName: formData.lastName,
            email: formData.email,
            password: formData.password,
            address: formData.address,
        };
            // name: formData.name,
            // lastName: formData.lastName,
            // email: formData.email,
            // password: formData.password,
            // address: formData.address,

    // Realiza la solicitud POST con los datos del usuario
    try {
        const response = await axios.post('http://127.0.0.1:8000/api/users/', userData);
        console.log('Registro exitoso. Redirigiendo a Login...', response.data);
    
        // Redirige al usuario después de limpiar los campos
        navigation.navigate('Login'); // Reemplaza 'Login' con el nombre de la pantalla de inicio de sesión correcto
        } catch (error) {
        console.error('Error en la solicitud POST:', error);
        Alert.alert('Error', 'No se ha podido registrar el usuario.');
        }

        setFormData({
            name: '',
            lastName: '',
            email: '',
            password: '',
            confirmarContraseña: '',
            address: '',
            });
        
            setFormData({
                name: '',
                lastName: '',
                email: '',
                password: '',
                confirmarContraseña: '',
                address: '',
                });
            navigation.navigate('Login')
                };

    // const handleClearInputs = () => {
    //     // Limpia los campos de entrada
    //     setFormData({
    //         name: '',
    //         lastName: '',
    //         email: '',
    //         password: '',
    //         confirmarContraseña: '',
    //         address: '',
    //     });
    // };

    return (
        <View style={styles.container}>
            <ScrollView contentContainerStyle={styles.container}>
                <Text>Registro de usuario: </Text>
                <TextInput
                    style={styles.inputs}
                    placeholder="Nombre"
                    onChangeText={(text) => setFormData({ ...formData, name: text })}
                    value={formData.name}
                />
                <TextInput
                    style={styles.inputs}
                    placeholder="Apellidos"
                    onChangeText={(text) =>
                    setFormData({ ...formData, lastName: text })}
                    value={formData.lastName}
                />
                <TextInput
                    style={styles.inputs}
                    placeholder="Email"
                    onChangeText={(text) => setFormData({ ...formData, email: text })}
                    value={formData.email}
                />
                <TextInput
                    style={styles.inputs}
                    placeholder="Contraseña"
                    onChangeText={(text) => setFormData({ ...formData, password: text })}
                    secureTextEntry={true}
                    value={formData.password}
                />
                <TextInput
                    style={styles.inputs}
                    placeholder="Confirmar contraseña"
                    onChangeText={(text) =>
                    setFormData({ ...formData, confirmarContraseña: text })
                }
                    secureTextEntry={true}
                    value={formData.confirmarContraseña}
                />
                <TextInput
                    style={styles.inputs}
                    placeholder="Dirección"
                    onChangeText={(text) => setFormData({ ...formData, address: text })}
                    value={formData.address}
                />
                <TouchableOpacity style={styles.Buttons} onPress={handleCreateUser}>
                <Text style={styles.buttonText}>Crear nuevo usuario</Text>
                </TouchableOpacity>
                {/* <TouchableOpacity style={styles.Buttons} onPress={handleClearInputs}>
                <Text style={styles.buttonText}>Limpiar campos</Text>
                </TouchableOpacity> */}
            </ScrollView>
        </View>
    );
}

const styles = StyleSheet.create({
    container: {
        flexGrow: 1, // Para permitir que el contenido crezca y sea desplazable
        justifyContent: 'center',
        alignItems: 'center',
    },
    inputs: {
        justifyContent: 'center',
        alignItems: 'center',
        backgroundColor: '#fff',
        textAlign: 'center',
        borderWidth: 1,
        borderColor: '#000',
        width: 200,
        height: 40,
        padding: 10,
        margin: 10,
        borderRadius: 10,
    },
    Buttons: {
        width: 300,
        height: 40,
        backgroundColor: "#2ECC71", // Color de los botónes
        justifyContent: "center",
        alignItems: "center",
        borderRadius: 5,
        marginBottom: 10,
    },
    buttonText: {
    color: "#FFFFFF", // Color del texto de los botones
    fontWeight: "bold",
    },
});
