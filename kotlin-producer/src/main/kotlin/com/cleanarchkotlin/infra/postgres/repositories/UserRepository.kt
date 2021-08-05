package com.cleanarchkotlin.infra.postgres.repositories

import com.cleanarchkotlin.data.contracts.CreateUserRepository
import com.cleanarchkotlin.data.contracts.ListUserRepository
import com.cleanarchkotlin.data.dto.UserDTO
import com.cleanarchkotlin.infra.postgres.entities.User
import io.quarkus.hibernate.orm.panache.kotlin.PanacheRepository
import javax.enterprise.context.RequestScoped
import javax.transaction.Transactional
import kotlin.streams.toList
import com.cleanarchkotlin.domain.usecases.User as UserModel

@RequestScoped
class UserRepository : PanacheRepository<User>, CreateUserRepository, ListUserRepository {
    fun findByName(name: String) = find("name", name).firstResult()
    fun findAllUsers() = findAll()

    @Transactional
    override fun save(user: UserModel): UserModel {
        val userEntity = User()
        userEntity.name = user.name
        userEntity.email = user.email.value
        userEntity.password = user.password.value
        persist(userEntity)
        return user
    }

    override fun list(): List<UserDTO> = findAll().stream().map{ adapter(it) }.toList()

    private fun adapter(user: User): UserDTO {
        return UserDTO(
            user.email,
            user.password,
            user.name
        )
    }
}