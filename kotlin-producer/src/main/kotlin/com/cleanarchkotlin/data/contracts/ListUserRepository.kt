package com.cleanarchkotlin.data.contracts

import com.cleanarchkotlin.data.dto.UserDTO

interface ListUserRepository {
    fun list(): List<UserDTO>
}