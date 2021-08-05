package com.cleanarchkotlin.data.contracts

import com.cleanarchkotlin.data.dto.UserDTO

interface ListUser {
    fun list(): List<UserDTO>
}