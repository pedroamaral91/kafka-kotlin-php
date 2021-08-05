package com.cleanarchkotlin.data.contracts

import com.cleanarchkotlin.domain.usecases.User

interface CreateUserRepository {
    fun save(user: User): User
}