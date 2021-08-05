package com.cleanarchkotlin.data.contracts

import com.cleanarchkotlin.data.dto.UserDTO

interface CreateUser {
    fun create(email: String, password: String, name: String): UserDTO
}