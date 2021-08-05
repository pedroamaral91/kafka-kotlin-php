package com.cleanarchkotlin.data.usecases

import com.cleanarchkotlin.data.contracts.CreateUser
import com.cleanarchkotlin.data.contracts.CreateUserRepository
import com.cleanarchkotlin.data.dto.UserDTO
import com.cleanarchkotlin.domain.usecases.User
import com.cleanarchkotlin.domain.valueobjects.EmailValueObject
import com.cleanarchkotlin.domain.valueobjects.PasswordValueObject
import javax.enterprise.context.RequestScoped
import javax.inject.Inject

@RequestScoped
class DbCreateUser @Inject constructor(
    private val createUserRepository: CreateUserRepository
) : CreateUser {
    override fun create(email: String, password: String, name: String): UserDTO {
        val user = createUserRepository.save(User(EmailValueObject(email), PasswordValueObject(password), name))
        return UserDTO(user.email.value, user.password.value, user.name)
    }
}
